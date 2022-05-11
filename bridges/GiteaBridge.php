<?php
/**
 * Gitea is a community managed lightweight code hosting solution.
 * https://docs.gitea.io/en-us/
 */

class GiteaBridge extends BridgeAbstract {

	const NAME = 'Gitea';
	const URI = 'https://gitea.io';
	const DESCRIPTION = 'Returns the latest issues, commits or releases';
	const MAINTAINER = 'gileri';
	const CACHE_TIMEOUT = 300; // 5 minutes

	const PARAMETERS = array(
		'global' => array(
			'host' => array(
				'name' => 'Host',
				'exampleValue' => 'https://gitea.com',
				'required' => true,
				'title' => 'Host name with its protocol, without trailing slash',
			),
			'user' => array(
				'name' => 'Username',
				'exampleValue' => 'gitea',
				'required' => true,
				'title' => 'User name as it appears in the URL',
			),
			'project' => array(
				'name' => 'Project name',
				'exampleValue' => 'helm-chart',
				'required' => true,
				'title' => 'Project name as it appears in the URL',
			),
		),
		'Commits' => array(
			'branch' => array(
				'name' => 'Branch name',
				'defaultValue' => 'master',
				'required' => true,
				'title' => 'Branch name as it appears in the URL',
			),
		),
		'Issues' => array(
			'include_description' => array(
				'name' => 'Include issue description',
				'type' => 'checkbox',
				'title' => 'Activate to include the issue description',
			),
		),
		'Single issue' => array(
			'issue' => array(
				'name' => 'Issue number',
				'type' => 'number',
				'exampleValue' => 100,
				'required' => true,
				'title' => 'Issue number from the issues list',
			),
		),
		'Single pull request' => array(
			'pull_request' => array(
				'name' => 'Pull request number',
				'type' => 'number',
				'exampleValue' => 100,
				'required' => true,
				'title' => 'Pull request number from the issues list',
			),
		),
		'Pull requests' => array(
			'include_description' => array(
				'name' => 'Include pull request description',
				'type' => 'checkbox',
				'title' => 'Activate to include the pull request description',
			),
		),
		'Releases' => array(),
		'Tags' => array(),
	);

	private $title = '';

	public function getIcon() {
		return 'https://gitea.io/images/gitea.png';
	}

	public function getName() {
		switch($this->queriedContext) {
			case 'Commits':
			case 'Issues':
			case 'Pull requests':
			case 'Releases': return $this->title . ' ' . $this->queriedContext;
			case 'Single issue': return ' Issue ' . $this->getInput('issue') . ': ' . $this->title;
			case 'Single pull request': return 'Pull request ' . $this->getInput('pull_request') . ': ' . $this->title;
			case 'Tags': return 'Tags for ' . $this->title;
			default: return parent::getName();
		}
	}

	public function getURI() {
		switch($this->queriedContext) {
			case 'Commits': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/commits/' . $this->getInput('branch');
			} break;
			case 'Issues': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/issues/';
			} break;
			case 'Single issue': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/issues/' . $this->getInput('issue');
			} break;
			case 'Releases': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/releases/';
			} break;
			case 'Tags': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/tags/';
			} break;
			case 'Pull requests': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/pulls/';
			} break;
			case 'Single pull request': {
				return $this->getInput('host')
				. '/' . $this->getInput('user')
				. '/' . $this->getInput('project')
				. '/pulls/' . $this->getInput('pull_request');
			} break;
			default: return parent::getURI();
		}
	}

	public function collectData() {
		$html = getSimpleHTMLDOM($this->getURI())
			or returnServerError('Could not request ' . $this->getURI());
		$html = defaultLinkTo($html, $this->getURI());

		$this->title = $html->find('[property="og:title"]', 0)->content;

		switch($this->queriedContext) {
			case 'Commits': {
				$this->collectCommitsData($html);
			} break;
			case 'Issues': {
				$this->collectIssuesData($html);
			} break;
			case 'Pull requests': {
				$this->collectPullRequestsData($html);
			} break;
			case 'Single issue': {
				$this->collectSingleIssueOrPrData($html);
			} break;
			case 'Single pull request': {
				$this->collectSingleIssueOrPrData($html);
			} break;
			case 'Releases': {
				$this->collectReleasesData($html);
			} break;
			case 'Tags': {
				$this->collectTagsData($html);
			} break;
		}
	}

	protected function collectReleasesData($html) {
		$releases = $html->find('#release-list > li')
			or returnServerError('Unable to find releases');

		foreach($releases as $release) {
			$this->items[] = array(
				'author' => $release->find('.author', 0)->plaintext,
				'uri' => $release->find('a', 0)->href,
				'title' => 'Release ' . $release->find('h4', 0)->plaintext,
				'timestamp' => $release->find('.time-since', 0)->title,
			);
		}
	}

	protected function collectTagsData($html) {
		$tags = $html->find('table#tags-table > tbody > tr')
			or returnServerError('Unable to find tags');

		foreach($tags as $tag) {
			$this->items[] = array(
				'uri' => $tag->find('a', 0)->href,
				'title' => 'Tag ' . $tag->find('.release-tag-name > a', 0)->plaintext,
			);
		}
	}

	protected function collectCommitsData($html) {
		$commits = $html->find('#commits-table tbody tr')
			or returnServerError('Unable to find commits');

		foreach($commits as $commit) {
			$this->items[] = array(
				'uri' => $commit->find('a.sha', 0)->href,
				'title' => $commit->find('.message span', 0)->plaintext,
				'author' => $commit->find('.author', 0)->plaintext,
				'timestamp' => $commit->find('.time-since', 0)->title,
				'uid' => $commit->find('.sha', 0)->plaintext,
			);
		}
	}

	protected function collectIssuesData($html) {
		$issues = $html->find('.issue.list li')
			or returnServerError('Unable to find issues');

		foreach($issues as $issue) {
			$uri = $issue->find('a', 0)->href;

			$item = array(
				'uri' => $uri,
				'title' => trim($issue->find('a.index', 0)->plaintext) . ' | ' . $issue->find('a.title', 0)->plaintext,
				'author' => $issue->find('.desc a', 1)->plaintext,
				'timestamp' => $issue->find('.time-since', 0)->title,
			);

			if($this->getInput('include_description')) {
				$issue_html = getSimpleHTMLDOMCached($uri, 3600)
					or returnServerError('Unable to load issue description');

				$issue_html = defaultLinkTo($issue_html, $uri);

				$item['content'] = $issue_html->find('.comment .markup', 0);
			}

			$this->items[] = $item;
		}
	}

	protected function collectSingleIssueOrPrData($html) {
		$comments = $html->find('.comment')
			or returnServerError('Unable to find comments');

		foreach($comments as $comment) {
			if (strpos($comment->getAttribute('class'), 'form') !== false
				|| strpos($comment->getAttribute('class'), 'merge') !== false
			) {
				// Ignore comment form and merge information
				continue;
			}
			$commentLink = $comment->find('a[href*="#issue"]', 0);
			$this->items[] = array(
				'uri' => $commentLink->href,
				'title' => str_replace($commentLink->plaintext, '', $comment->find('span', 0)->plaintext),
				'author' => $comment->find('.author a', 0)->plaintext,
				'timestamp' => $comment->find('.time-since', 0)->title,
				'content' => $comment->find('.render-content', 0),
			);
		}

		$this->items = array_reverse($this->items);
	}

	protected function collectPullRequestsData($html) {
		$issues = $html->find('.issue.list li')
			or returnServerError('Unable to find pull requests');

		foreach($issues as $issue) {
			$uri = $issue->find('a', 0)->href;

			$item = array(
				'uri' => $uri,
				'title' => trim($issue->find('a.index', 0)->plaintext) . ' | ' . $issue->find('a.title', 0)->plaintext,
				'author' => $issue->find('.desc a', 1)->plaintext,
				'timestamp' => $issue->find('.time-since', 0)->title,
			);

			if($this->getInput('include_description')) {
				$issue_html = getSimpleHTMLDOMCached($uri, 3600)
					or returnServerError('Unable to load issue description');

				$issue_html = defaultLinkTo($issue_html, $uri);

				$item['content'] = $issue_html->find('.comment .markup', 0);
			}

			$this->items[] = $item;
		}
	}
}
