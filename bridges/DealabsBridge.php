<?php
class DealabsBridge extends PepperBridgeAbstract {

	const NAME = 'Dealabs Bridge';
	const URI = 'https://www.dealabs.com/';
	const DESCRIPTION = 'Affiche les Deals de Dealabs';
	const MAINTAINER = 'sysadminstory';
	const PARAMETERS = array(
		'Recherche par Mot(s) clé(s)' => array (
			'q' => array(
				'name' => 'Mot(s) clé(s)',
				'type' => 'text',
				'required' => true
			),
			'hide_expired' => array(
				'name' => 'Masquer les éléments expirés',
				'type' => 'checkbox',
			),
			'hide_local' => array(
				'name' => 'Masquer les deals locaux',
				'type' => 'checkbox',
				'title' => 'Masquer les deals en magasins physiques',
			),
			'priceFrom' => array(
				'name' => 'Prix minimum',
				'type' => 'text',
				'title' => 'Prix mnimum en euros',
				'required' => false
			),
			'priceTo' => array(
				'name' => 'Prix maximum',
				'type' => 'text',
				'title' => 'Prix maximum en euros',
				'required' => false
			),
		),

		'Deals par groupe' => array(
			'group' => array(
				'name' => 'Groupe',
				'type' => 'list',
				'title' => 'Groupe dont il faut afficher les deals',
				'values' => array(
					'Abattants WC' => 'abattants-wc',
					'Abonnement PlayStation Plus' => 'playstation-plus',
					'Abonnements cinéma' => 'abonnements-cinema',
					'Abonnements de train' => 'abonnements-de-train',
					'Abonnements internet' => 'abonnements-internet',
					'Abonnements presse' => 'abonnements-presse',
					'Accessoires aquarium' => 'accessoires-aquarium',
					'Accessoires auto' => 'auto',
					'Accessoires électroniques' => 'accessoires-gadgets',
					'Accessoires gamers PC' => 'accessoires-gamers-pc',
					'Accessoires gaming' => 'accessoires-gaming',
					'Accessoires iPhone' => 'accessoires-iphone',
					'Accessoires mode' => 'accessoires-mode',
					'Accessoires moto' => 'moto',
					'Accessoires Nintendo' => 'accessoires-nintendo',
					'Accessoires PC portables' => 'accessoires-pc-portables',
					'Accessoires photo' => 'accessoires-photo',
					'Accessoires PlayStation' => 'accessoires-playstation',
					'Accessoires pour barbecue' => 'accessoires-barbecue',
					'Accessoires studio photo' => 'accessoires-studio-photo',
					'Accessoires téléphonie' => 'accessoires-telephonie',
					'Accessoires TV' => 'accessoires-tv',
					'Accessoires vélo' => 'accessoires-velo',
					'Accessoires Xbox' => 'accessoires-xbox',
					'Acer' => 'acer',
					'Acer Predator' => 'acer-predator',
					'Achats / Ventes' => 'achats-ventes-echanges-estimations-dons',
					'Achats à l&#039;étranger' => 'limport-sites-avis-questions-langues',
					'Adaptateurs' => 'adaptateurs',
					'Adhérents Fnac' => 'adherents-fnac',
					'Adhésions &amp; Souscriptions' => 'adhesions-souscriptions-abonnements',
					'adidas' => 'adidas',
					'Adidas Gazelle' => 'adidas-gazelle',
					'adidas Stan Smith' => 'adidas-stan-smith',
					'adidas Superstar' => 'adidas-superstar',
					'adidas Ultraboost' => 'adidas-ultraboost',
					'adidas Yung-1' => 'adidas-yung-1',
					'adidas ZX Flux' => 'adidas-zx-flux',
					'Adoucissant' => 'adoucissant',
					'Agendas' => 'agendas',
					'Age of Empires' => 'age-of-empires',
					'Age of Empires: Definitive Edition' => 'age-of-empires-definitive-edition',
					'Alarmes' => 'alarmes',
					'Albums photo' => 'albums-photo',
					'Alcools' => 'alcools',
					'Alcools forts' => 'alcools-forts',
					'Alimentation' => 'epicerie',
					'Alimentation bébés' => 'alimentation-bebes',
					'Alimentation PC' => 'alimentation-pc',
					'Alimentation sportifs' => 'alimentation-sportifs',
					'Amazfit Bip' => 'xiaomi-amazfit-bip',
					'Amazon Echo' => 'amazon-echo',
					'Amazon Echo Dot' => 'amazon-echo-dot',
					'Amazon Echo Plus' => 'amazon-echo-plus',
					'Amazon Echo Show' => 'amazon-echo-show',
					'Amazon Echo Show 5' => 'amazon-echo-show-5',
					'Amazon Echo Spot' => 'amazon-echo-spot',
					'Amazon Fire TV' => 'amazon-fire-tv',
					'Amazon Kindle' => 'amazon-kindle',
					'Amazon Prime' => 'amazon-prime',
					'AMD Radeon' => 'amd-radeon',
					'AMD Ryzen' => 'amd-ryzen',
					'AMD Ryzen 5 5600X' => 'amd-ryzen-5-5600x',
					'AMD Ryzen 7 5800X' => 'amd-ryzen-7-5800x',
					'AMD Ryzen 9 5900X' => 'amd-ryzen-9-5900x',
					'AMD Ryzen 9 5950X' => 'amd-ryzen-9-5950x',
					'AMD Vega' => 'amd-vega',
					'amiibo' => 'amiibo',
					'Amplis (guitare/basse)' => 'amplis-guitare-basse',
					'Amplis audio' => 'amplis',
					'Ampoules' => 'ampoules',
					'Ampoules à LED' => 'ampoules-a-led',
					'Angleterre' => 'angleterre',
					'Animal Crossing' => 'animal-crossing',
					'Animal Crossing: New Horizons' => 'animal-crossing-new-horizons',
					'Animaux' => 'animaux',
					'Anker' => 'anker',
					'Anno 1800' => 'anno-1800',
					'Annonces officielles' => 'annonces-officielles',
					'Anthem' => 'anthem',
					'Anti-nuisibles' => 'anti-nuisibles',
					'Anti-puces' => 'anti-puces',
					'Antivirus' => 'antivirus',
					'Antivols' => 'antivols',
					'Apex Legends' => 'apex-legends',
					'Appareils à raclette' => 'appareils-raclette',
					'Appareils de musculation' => 'appareils-de-musculation',
					'Appareils photo' => 'appareils-photo',
					'Appareils photo Canon' => 'appareils-photo-canon',
					'Appareils photo compacts' => 'appareils-photo-compacts',
					'Appareils photo instantanés' => 'appareils-photo-instantanes',
					'Appareils photo Nikon' => 'appareils-photo-nikon',
					'Appareils photo Olympus' => 'appareils-photo-olympus',
					'Appareils photo Panasonic' => 'appareils-photo-panasonic',
					'Appareils photo Sony' => 'appareils-photo-sony',
					'Apple' => 'apple',
					'Apple AirPods' => 'apple-airpods',
					'Apple AirPods 2' => 'apple-airpods-2',
					'Apple AirPods Max' => 'apple-airpods-max',
					'Apple AirPods Pro' => 'apple-airpods-pro',
					'Apple HomePod' => 'apple-homepod',
					'Apple HomePod Mini' => 'apple-homepod-mini',
					'Apple TV' => 'apple-tv',
					'Apple TV+' => 'apple-tv-plus',
					'Apple Watch' => 'apple-watch',
					'Apple Watch 3' => 'apple-watch-3',
					'Apple Watch 4' => 'apple-watch-4',
					'Apple Watch 5' => 'apple-watch-5',
					'Apple Watch 6' => 'apple-watch-6',
					'Apple Watch SE' => 'apple-watch-se',
					'Applications' => 'applications',
					'Applications Android' => 'applications-android',
					'Applications iOS' => 'applications-ios',
					'Appliques murales' => 'appliques-murales',
					'Applis &amp; logiciels' => 'applis-logiciels',
					'Après-shampooings' => 'apres-shampooings',
					'Aquariums' => 'aquariums',
					'Arbres à chat' => 'arbres-a-chat',
					'Arduino' => 'arduino',
					'Armoires &amp; placards' => 'armoires-et-placards',
					'Articles de cuisine et d&#039;entretien' => 'articles-de-cuisine',
					'Arts culinaires' => 'arts-culinaires',
					'Arts de la table' => 'arts-de-la-table',
					'ASICS' => 'asics',
					'Asmodée' => 'asmodee',
					'Aspirateurs' => 'aspirateurs',
					'Aspirateurs balais' => 'aspirateurs-balais',
					'Aspirateurs Dreame' => 'aspirateurs-xiaomi',
					'Aspirateurs Dyson' => 'aspirateurs-dyson',
					'Aspirateurs robot' => 'aspirateurs-robot',
					'Aspirateurs Rowenta' => 'apsirateurs-rowenta',
					'Aspirateurs sans sac' => 'aspirateurs-sans-sac',
					'Assassin&#039;s Creed' => 'assassin-s-creed',
					'Assassin&#039;s Creed: Unity' => 'assassins-creed-unity',
					'Assassin&#039;s Creed: Valhalla' => 'assassin-s-creed-valhalla',
					'Assassin&#039;s Creed Odyssey' => 'assassin-s-creed-odyssey',
					'Assassin&#039;s Creed Origins' => 'assassin-s-creed-origins',
					'Assurances' => 'assurances',
					'Astuces pour économiser' => 'vos-astuces-pour-faire-des-economies',
					'Asus' => 'asus',
					'Asus ROG' => 'asus-rog',
					'Asus ROG Phone' => 'asus-rog-phone',
					'Asus ROG Phone 2' => 'asus-rog-phone-2',
					'ASUS Transformer' => 'asus-transformer',
					'Asus VivoBook' => 'asus-vivobook',
					'Asus ZenBook' => 'asus-zenbook',
					'Asus ZenFone 2' => 'asus-zenfone-2',
					'Asus ZenFone 3' => 'asus-zenfone-3',
					'Asus ZenFone 4' => 'asus-zenfone-4',
					'Asus ZenFone 6' => 'asus-zenfone-6',
					'Asus ZenFone GO' => 'asus-zenfone-go',
					'Asus ZenFone Zoom' => 'asus-zenfone-zoom',
					'Audio &amp; Hi-fi' => 'audio-et-hi-fi',
					'Aukey' => 'aukey',
					'Auto-Moto' => 'auto-moto',
					'Autoradios' => 'autoradios',
					'Azzaro Wanted' => 'azzaro-wanted',
					'Baby foot' => 'baby-foot',
					'BabyLiss' => 'babyliss',
					'Babyphones' => 'babyphones',
					'Badminton' => 'badminton',
					'Bagagerie' => 'bagagerie',
					'Baignoires pour bébé' => 'baignoires-pour-bebe',
					'Bains de bouche' => 'bains-de-bouche',
					'Balais &amp; serpillères' => 'balais-et-serpilleres',
					'Balances connectées' => 'balances-connectees',
					'Balançoires' => 'balancoires',
					'Ballet &amp; danse' => 'ballet-et-danse',
					'Ballons de football' => 'ballons-de-football',
					'Bandes dessinées' => 'bandes-dessinees',
					'Banques' => 'banques',
					'Barbecue' => 'barbecue',
					'Barbecue électrique' => 'barbecue-electrique',
					'Barbecue Weber' => 'barbecue-weber',
					'Barbie' => 'barbie',
					'Barres de son' => 'barres-de-son',
					'Barres de son Yamaha' => 'barres-de-son-yamaha',
					'Batman Arkham' => 'batman-arkham',
					'Batteries externes' => 'batteries-externes',
					'Batteries voiture' => 'batteries-voiture',
					'Batteurs' => 'batteurs-electriques',
					'Battlefield' => 'battlefield',
					'Battlefield 1' => 'battlefield-1',
					'Battlefield V' => 'battlefield-5',
					'Béaba' => 'beaba',
					'Beats by Dre' => 'beats-by-dre',
					'Beats Solo 3' => 'beats-solo-3',
					'Beats Studio 3' => 'beats-studio-3',
					'Beauté' => 'beaute',
					'Bébés' => 'bebes-nouveaux-nes',
					'BenQ' => 'benq',
					'Be quiet!' => 'be-quiet',
					'Beyerdynamic MMX 300' => 'beyerdynamic-mmx-300',
					'Biberons' => 'biberons',
					'Bien-être &amp; santé' => 'bien-etre-et-massages',
					'Bières' => 'bieres',
					'Bijoux' => 'bijoux',
					'Bikinis' => 'bikinis',
					'Bilans de santé &amp; dépistages' => 'bilans-de-sante-et-depistages',
					'Billets de bus' => 'billets-de-bus',
					'Billets de train' => 'billets-de-train',
					'BioShock' => 'bioshock',
					'BioShock Infinite' => 'bioshock-infinite',
					'Bitdefender' => 'bitdefender',
					'Blabla' => 'blabla-parlez-de-tout-et-de-rien',
					'Black &amp; Decker' => 'black-decker',
					'Blackberry' => 'blackberry',
					'Black Desert Online' => 'black-desert-online',
					'Blédina' => 'bledina',
					'Blenders' => 'blenders',
					'Bleu de Chanel' => 'bleu-de-chanel',
					'Blousons de moto' => 'blousons-de-moto',
					'Blu-Ray' => 'blu-ray',
					'Bodys pour bébé' => 'bodys-pour-bebe',
					'Boissons' => 'boissons',
					'Boîtes à outils' => 'boites-a-outils',
					'Boîtiers PC' => 'boitiers-pc',
					'Boîtiers TV' => 'boitiers-tv',
					'Bonbons' => 'bonbons',
					'Bonnets' => 'bonnets',
					'Bonnets de bain' => 'bonnets-de-bain',
					'Borderlands' => 'borderlands',
					'Borderlands 3' => 'borderlands-3',
					'Bosch' => 'bosch',
					'Bose' => 'bose',
					'Bose Headphones 700' => 'bose-headphones-700',
					'Bose Home Speaker 500' => 'bose-home-speaker-500',
					'Bose QuietComfort' => 'bose-quietcomfort',
					'Bose QuietComfort 35 II' => 'bose-quietcomfort-35ii',
					'Bose SoundLink' => 'bose-soundlink',
					'Bose SoundTouch' => 'bose-soundtouch',
					'Bottes' => 'bottes',
					'Bottes de moto' => 'bottes-de-moto',
					'Bottes de neige' => 'bottes-neige',
					'Bottes de pluie' => 'bottes-pluie',
					'Bottes femme' => 'bottes-femme',
					'Bottes homme' => 'bottes-homme',
					'Bougies &amp; bougeoirs' => 'bougies-et-bougeoirs',
					'Box beauté' => 'box-beaute',
					'Bracelet fitness' => 'bracelet-fitness',
					'Brandt' => 'brandt',
					'Braun Series 3' => 'braun-series-3',
					'Braun Series 5' => 'braun-series-5',
					'Braun Series 7' => 'braun-series-7',
					'Braun Series 9' => 'braun-series-9',
					'Braun Silk Épil' => 'braun-silk-epil',
					'Brita' => 'brita',
					'Brosses à dents' => 'brosses-a-dents',
					'Brosses à dents électriques' => 'brosses-a-dents-electriques',
					'Brosses à dents électriques Oral-B' => 'brosses-a-dents-electriques-oral-b',
					'Brosses pour animaux' => 'brosses-pour-animaux',
					'Cable management' => 'cable-management',
					'Câbles' => 'cables',
					'Câbles Ethernet' => 'cables-ethernet',
					'Câbles HDMI' => 'cables-hdmi',
					'Câbles Jack' => 'cables-jack',
					'Câbles USB' => 'cables-usb',
					'Cadeaux' => 'cadeaux',
					'Cadres' => 'cadres',
					'Cadres de vélo' => 'cadres-de-velo',
					'Café' => 'cafe',
					'Café en dosettes' => 'cafe-en-dosettes',
					'Café en grain' => 'cafe-en-grain',
					'Cafetières' => 'cafetieres',
					'Cafetières expresso' => 'cafetieres-expresso',
					'Cafetières filtre' => 'cafetieres-filtre',
					'Cafetières italiennes' => 'cafetieres-italiennes',
					'Cahiers' => 'cahiers',
					'Caissons de basses' => 'caissons-de-basses',
					'Calendrier de l&#039;Avent Lego' => 'calendriers-avent-lego',
					'Calendriers' => 'calendriers',
					'Calendriers de l&#039;Avent' => 'calendriers-avent',
					'Call of Duty' => 'call-of-duty',
					'Call of Duty: Black Ops Cold War' => 'call-of-duty-black-ops-cold-war',
					'Call of Duty: Black Ops III' => 'call-of-duty-black-ops-3',
					'Call of Duty: Black Ops IIII' => 'call-of-duty-black-ops-4',
					'Call of Duty: Infinite Warfare' => 'call-of-duty-infinite-warfare',
					'Call of Duty: Modern Warfare' => 'call-of-duty-modern-warfare',
					'Call of Duty: WW2' => 'call-of-duty-ww2',
					'Calor' => 'calor',
					'Caméras' => 'cameras',
					'Caméras IP' => 'cameras-ip',
					'Caméras sportives' => 'cameras-sportives',
					'Camping' => 'camping',
					'Canapés' => 'canape',
					'Canon' => 'canon',
					'Captain Toad: Treasure Tracker' => 'captain-toad-treasure-tracker',
					'Caravanes' => 'caravanes',
					'Carburant' => 'carburant',
					'Cartables' => 'cartables',
					'Cartes &amp; programmes de fidélité' => 'cartes-et-programmes-de-fidelite',
					'Cartes bancaires' => 'cartes-bancaires',
					'Cartes de développement' => 'cartes-developpement',
					'Cartes graphiques' => 'cartes-graphiques',
					'Cartes mémoire' => 'cartes-memoire',
					'Cartes mères' => 'cartes-meres',
					'Cartes postales' => 'cartes-postales',
					'Cartes prépayées Playstation Store' => 'playstation-store',
					'Cartes SD' => 'cartes-sd',
					'Cartes son' => 'cartes-son',
					'Casio' => 'casio',
					'Casque sans fil Xbox' => 'casque-sans-fil-xbox',
					'Casques Apple' => 'casques-apple',
					'Casques à réduction de bruit' => 'casque-reduction-active-bruit',
					'Casques audio' => 'casques-audio',
					'Casques Bose' => 'casques-bose',
					'Casques de moto' => 'casques-de-moto',
					'Casques de vélo' => 'casques-de-velo',
					'Casques Jabra' => 'casques-jabra',
					'Casques Samsung' => 'casques-samsung',
					'Casques sans fil' => 'casques-sans-fil',
					'Casques Sennheiser' => 'casques-sennheiser',
					'Casques Sony' => 'casques-sony',
					'Casques VR' => 'vr',
					'Casquettes' => 'casquettes',
					'Casseroles' => 'casseroles',
					'Catit' => 'catit',
					'Caves à vin' => 'caves-a-vin',
					'CD &amp; vinyles' => 'cd-vinyles',
					'CDAV' => 'cdav',
					'Ceintures' => 'ceintures',
					'Centrales vapeur' => 'centrales-vapeur',
					'Chaînes hi-fi' => 'chaines-hi-fi',
					'Chaises' => 'chaises',
					'Chaises hautes' => 'chaises-hautes',
					'Chambre' => 'chambre',
					'Champagne' => 'champagne',
					'Chapeaux' => 'chapeaux',
					'Chapeaux &amp; casquettes' => 'chapeaux-casquettes',
					'Chargeurs' => 'chargeurs',
					'Chargeurs allume-cigare' => 'chargeurs-allume-cigare',
					'Chargeurs de piles' => 'chargeurs-de-piles',
					'Chargeurs sans fil' => 'chargeurs-sans-fil',
					'Chasse' => 'chasse',
					'Chatières' => 'chatieres',
					'Chats' => 'chats',
					'Chauffage' => 'chauffage',
					'Chaussettes &amp; collants' => 'chaussettes-et-collants',
					'Chaussons' => 'chaussons',
					'Chaussures' => 'chaussures',
					'Chaussures adidas' => 'chaussures-adidas',
					'Chaussures de football' => 'chaussures-de-football',
					'Chaussures de randonnée' => 'chaussures-de-randonnee',
					'Chaussures de ski' => 'chaussures-de-ski',
					'Chaussures de ville' => 'chaussures-de-ville',
					'Chaussures New Balance' => 'chaussures-new-balance',
					'Chaussures Nike' => 'chaussures-nike',
					'Chaussures pour enfants' => 'chaussures-enfants',
					'Chaussures pour femme' => 'chaussures-femme',
					'Chaussures pour homme' => 'chaussures-homme',
					'Chaussures Puma' => 'chaussures-puma',
					'Chaussures Reebok' => 'chaussures-reebok',
					'Chaussures running' => 'chaussures-de-running',
					'Chelsea boots' => 'chelsea-boots',
					'Chemises' => 'chemises',
					'Chiens' => 'chiens',
					'Chocolat' => 'chocolat',
					'Chuck Taylor' => 'chuck-taylor',
					'Cinéma' => 'cinema',
					'Cire dépilatoire' => 'cire-depilatoire',
					'Cirque &amp; arts de rue' => 'cirque-et-arts-de-rue',
					'Citytrips' => 'citytrips',
					'Civilization' => 'civilization',
					'Civilization VI' => 'civilization-vi',
					'CK One' => 'ck-one',
					'Clarks' => 'clarks',
					'Claviers' => 'claviers',
					'Claviers (musique)' => 'claviers-musique',
					'Claviers gamer' => 'claviers-gamer',
					'Claviers Logitech' => 'claviers-logitech',
					'Claviers mécaniques' => 'claviers-mecaniques',
					'Claviers sans fil' => 'claviers-sans-fil',
					'Clés USB' => 'cles-usb',
					'Climatisation' => 'climatisation',
					'Climatiseurs' => 'climatiseurs',
					'Cocottes' => 'cocottes',
					'Coffrets de livres' => 'coffrets-de-livres',
					'Coffrets DVD' => 'coffrets-dvd',
					'Coffrets maquillage' => 'coffrets-maquillage',
					'Colliers &amp; laisses' => 'colliers-et-laisses',
					'Compléments alimentaires' => 'complements-alimentaires',
					'Composteurs' => 'composteurs',
					'Concerts' => 'concerts',
					'Concours' => 'concours',
					'Congélateurs' => 'congelateurs',
					'Connectiques' => 'connectiques',
					'Console Google Stadia' => 'google-stadia',
					'Console Nintendo Classic Mini' => 'nintendo-classic-mini',
					'Console Nintendo Classic Mini: SNES' => 'nintendo-classic-mini-snes',
					'Console Nintendo Switch' => 'nintendo-switch',
					'Console Nintendo Switch Lite' => 'nintendo-switch-lite',
					'Console PS4' => 'playstation-4',
					'Console PS4 Pro' => 'playstation-4-pro',
					'Console PS5' => 'playstation-5',
					'Consoles' => 'consoles',
					'Consoles &amp; jeux vidéo' => 'consoles-jeux-video',
					'Console Sega Mega Drive Mini' => 'sega-mega-drive-mini',
					'Console Xbox One S' => 'xbox-one-s',
					'Console Xbox One X' => 'xbox-one-x',
					'Console Xbox Series S' => 'xbox-series-s',
					'Console Xbox Series X' => 'xbox-series-x',
					'Consommables imprimantes' => 'consommables-imprimantes',
					'Converse' => 'converse',
					'Coques iPhone' => 'coques-iphone',
					'Corsair Void PRO' => 'corsair-void-pro',
					'Costumes' => 'costumes',
					'Costumes &amp; déguisements' => 'costumes-et-deguisements',
					'Couches' => 'couches',
					'Couettes' => 'couettes',
					'Coupes menstruelles' => 'coupes-menstruelles',
					'Cours &amp; formations' => 'cours-et-formations',
					'Courses hippiques' => 'courses-hippiques',
					'Couteaux de cuisine' => 'couteaux-de-cuisine',
					'Couture' => 'couture',
					'Couverts' => 'couverts',
					'Couverts pour bébés' => 'couverts-pour-bebes',
					'Covoiturage' => 'covoiturage',
					'Crash Team Racing Nitro-Fueled' => 'crash-team-racing-nitro-fueled',
					'Cravates' => 'cravates',
					'Crédits' => 'credits',
					'Crèmes hydratantes' => 'cremes-hydratantes',
					'Crèmes solaires' => 'cremes-solaires',
					'Croisières' => 'croisieres',
					'Croquettes pour chat' => 'croquettes-pour-chat',
					'Croquettes pour chien' => 'croquettes-pour-chien',
					'Cuiseurs à riz' => 'cuiseur-riz',
					'Cuisinières' => 'cuisinieres',
					'Culottes menstruelles' => 'culottes-menstruelles',
					'Culture &amp; divertissement' => 'culture-divertissement',
					'Cyberpunk 2077' => 'cyberpunk-2077',
					'Cyclisme' => 'cyclisme',
					'Cyclisme &amp; sports urbains' => 'cyclisme-sports-urbains',
					'Darksiders' => 'darksiders',
					'Dashcams' => 'dashcams',
					'DDR3' => 'ddr3',
					'DDR4' => 'ddr4',
					'Dead Rising' => 'dead-rising',
					'Death Stranding' => 'death-stranding',
					'Décoration' => 'decoration',
					'Décorations de Noël' => 'decoration-noel',
					'Deebot' => 'ecovacs-deebot',
					'Deezer' => 'deezer',
					'Dell' => 'dell',
					'Dell XPS' => 'dell-xps',
					'Delsey' => 'delsey',
					'Demandes de deals' => 'les-demandes-de-deals',
					'Denon' => 'denon',
					'Dentifrices' => 'dentifrices',
					'Déodorants' => 'deodorants',
					'Désherbants' => 'desherbants',
					'Déshumidificateurs' => 'deshumidificateurs',
					'Désinfectant' => 'desinfectants',
					'Désodorisants &amp; parfums d&#039;intérieur' => 'desodorisants-et-parfums-d-interieur',
					'Destiny' => 'destiny',
					'Destiny 2' => 'destiny-2',
					'Détecteurs de fumée' => 'detecteurs-de-fumee',
					'Detroit: Become Human' => 'detroit-become-human',
					'Deus Ex' => 'deus-ex',
					'Deus Ex: Mankind Divided' => 'deus-ex-mankind-divided',
					'Devil May Cry 5' => 'devil-may-cry-5',
					'Dishonored' => 'dishonored',
					'Dishonored 2' => 'dishonored-2',
					'Disney+' => 'disney-plus',
					'Disneyland Paris' => 'disneyland-paris',
					'Disques durs (internes)' => 'hdd',
					'Disques durs externes' => 'disques-durs-externes',
					'Divers' => 'divers',
					'DJI' => 'dji',
					'DJI Mavic Air 2' => 'dji-mavic-air-2',
					'DJI Mavic Mini' => 'dji-mavic-mini',
					'Dolce Gusto' => 'dolce-gusto',
					'Domotique' => 'smart-home',
					'Doom Eternal' => 'doom-eternal',
					'Dosettes Dolce Gusto' => 'dosettes-dolce-guste',
					'Dosettes Nespresso' => 'dosettes-nespresso',
					'Dosettes Senseo' => 'dosettes-senseo',
					'Dosettes Tassimo' => 'dosettes-tassimo',
					'Dr. Martens' => 'dr-martens',
					'Dragon Age' => 'dragon-age',
					'Dragon Ball' => 'dragon-ball',
					'Dragon Ball FighterZ' => 'dragon-ball-fighterz',
					'Dragon Ball Z: Kakarot' => 'dragon-ball-z-kakarot',
					'Dragon Quest' => 'dragon-quest',
					'Dragon Quest Builders' => 'dragon-quest-builders',
					'Dragon Quest Builders 2' => 'dragon-quest-builders-2',
					'Draisiennes' => 'draisiennes',
					'Draps &amp; housses' => 'draps-et-housses',
					'Dreame V10' => 'xiaomi-dreame-v10',
					'Dreame V11' => 'xiaomi-dreame-v11',
					'Drones' => 'drones',
					'Durex' => 'durex',
					'DVD' => 'dvd',
					'Dying Light' => 'dying-light',
					'Dying Light 2' => 'dying-light-2',
					'Dyson' => 'dyson',
					'Dyson V10' => 'dyson-v10',
					'Dyson V11' => 'dyson-v11',
					'Eastpak' => 'eastpak',
					'Ebooks' => 'ebooks',
					'Écharpes &amp; foulards' => 'echarpes-et-foulards',
					'Éclairage intelligent' => 'smart-light',
					'Écouteurs' => 'ecouteurs',
					'Écouteurs sans fil' => 'ecouteurs-sans-fil',
					'Écouteurs sport' => 'ecouteurs-sport',
					'Ecovacs' => 'ecovacs',
					'Ecovacs Deebot 900' => 'ecovacs-deebot-900',
					'Ecovacs Deebot OZMO 930' => 'ecovacs-deebot-ozmo-930',
					'Écrans' => 'ecrans',
					'Écrans 4K / UHD' => 'ecrans-4k-uhd',
					'Écrans 21&quot; et moins' => 'ecrans-21-pouces-et-moins',
					'Écrans 24&quot;' => 'ecrans-24-pouces',
					'Écrans 27&quot;' => 'ecrans-27-pouces',
					'Écrans 29&quot; et plus' => 'ecrans-29-pouces-et-plus',
					'Écrans Acer' => 'ecrans-acer',
					'Écrans Asus' => 'ecrans-asus',
					'Écrans BenQ' => 'ecrans-benq',
					'Écrans Dell' => 'ecrans-dell',
					'Écrans de projection' => 'ecrans-de-projection',
					'Écrans FreeSync' => 'ecrans-freesync',
					'Écrans gaming' => 'ecrans-gamer',
					'Écrans incurvés' => 'ecrans-incurves',
					'Écrans Philips' => 'ecrans-philips',
					'Écrans Samsung' => 'ecrans-samsung',
					'Électricité (matériel)' => 'electricite',
					'Electrolux' => 'electrolux',
					'Électroménager' => 'electromenager',
					'Embauchoirs' => 'embauchoirs',
					'Enceintes' => 'enceintes',
					'Enceintes Bluetooth' => 'enceintes-bluetooth',
					'Enceintes connectées' => 'enceintes-connectees',
					'Enceintes portables sans fil' => 'enceintes-portables-sans-fil',
					'Énergie' => 'energie',
					'Engrais' => 'engrais',
					'Épicerie &amp; courses' => 'epicerie-courses-supermarches',
					'Épilateurs à lumière pulsée' => 'epilateurs-a-lumiere-pulsee',
					'Épilateurs électriques' => 'epilateurs-electriques',
					'Épilation' => 'epilation',
					'Équipement motard' => 'equipement-motard',
					'Équipement running' => 'equipement-running',
					'Équipement sportif' => 'equipement-sportif',
					'Érotisme' => 'erotisme',
					'Escarpins' => 'escarpins',
					'Événements sportifs' => 'evenements-sportifs',
					'Expositions' => 'expositions',
					'Extracteurs de jus' => 'extracteurs-de-jus',
					'F1 2017' => 'f1-2017',
					'F1 2019' => 'f1-2019',
					'Facom' => 'facom',
					'Fallout' => 'fallout',
					'Fallout 4' => 'fallout-4',
					'Fallout 76' => 'fallout-76',
					'Famille &amp; enfants' => 'famille-enfants',
					'Far Cry' => 'far-cry',
					'Far Cry New Dawn' => 'far-cry-new-dawn',
					'Fards à paupières' => 'fards-a-paupieres',
					'Fast-foods' => 'fast-foods',
					'Fauteuils' => 'fauteuils',
					'Fauteuils gamer' => 'fauteuils-gaming',
					'Fe' => 'fe',
					'Fers à lisser / à friser' => 'fers-a-lisser-a-friser',
					'Fers à repasser' => 'fers-a-repasser',
					'Fers à souder' => 'fers-a-souder',
					'Festivals' => 'festivals',
					'Feutres' => 'feutres',
					'FIFA' => 'fifa',
					'FIFA 17' => 'fifa-17',
					'FIFA 18' => 'fifa-18',
					'FIFA 19' => 'fifa-19',
					'FIFA 20' => 'fifa-20',
					'FIFA 21' => 'fifa-21',
					'Figurines' => 'figurines',
					'Films &amp; Séries' => 'films',
					'Final Fantasy' => 'final-fantasy',
					'Final Fantasy XII' => 'final-fantasy-xii',
					'Finances &amp; Assurances' => 'finances-assurances',
					'fitbit' => 'fitbit',
					'Fitness &amp; yoga' => 'fitness-yoga',
					'Flash' => 'flash',
					'Fluval' => 'fluval',
					'Foires &amp; salons' => 'foires-et-salons',
					'Fonds de teint' => 'fonds-de-teint',
					'Football' => 'football',
					'Forfaits de ski' => 'forfaits-ski',
					'Forfaits mobiles' => 'forfaits-mobiles',
					'Forfaits mobiles et internet' => 'telecommunications',
					'For Honor' => 'for-honor',
					'Formations premiers secours' => 'formations-premiers-secours',
					'Formule 1' => 'formule-1',
					'Fortnite' => 'fortnite',
					'Fortnite: Pack Feu Obscur' => 'fortnite-pack-feu-obscur',
					'Forza' => 'forza',
					'Forza Horizon' => 'forza-horizon',
					'Forza Horizon 3' => 'forza-horizon-3',
					'Forza Horizon 4' => 'forza-horizon-4',
					'Forza Motorsport' => 'forza-motosport',
					'Forza Motorsport 7' => 'forza-motorsport-7',
					'Fossil' => 'fossil',
					'Fournitures scolaires' => 'fournitures-scolaires',
					'Fours' => 'fours',
					'Fours à poser' => 'fours-a-poser',
					'Fours encastrables' => 'fours-encastrables',
					'Friandises pour chat' => 'friandises-pour-chat',
					'Friandises pour chien' => 'friandises-pour-chien',
					'Friskies' => 'friskies',
					'Friteuses' => 'friteuses',
					'Friteuses sans huile' => 'friteuses-sans-huile',
					'Fruits &amp; légumes' => 'fruits-et-legumes',
					'Fujifilm' => 'fujifilm',
					'Funko Pop' => 'funko-pop',
					'FURminator' => 'furminator',
					'Futuroscope' => 'futuroscope',
					'Gamelles' => 'gamelles',
					'Game of Thrones' => 'game-of-thrones',
					'Gaming' => 'le-laboratoire-des-gamers',
					'Gants' => 'gants',
					'Gants moto' => 'gants-moto',
					'Garmin' => 'garmin',
					'Garmin Fenix' => 'garmin-fenix',
					'Garmin Forerunner' => 'garmin-forerunner',
					'Garmin Vivoactive' => 'garmin-vivoactive',
					'Garmin Vivomove' => 'garmin-vivomove',
					'Gâteaux &amp; biscuits' => 'gateaux-et-biscuits',
					'Gears 5' => 'gears-5',
					'Gel hydroalcoolique' => 'gel-hydroalcoolique',
					'Gels douche' => 'gels-douche',
					'Geox' => 'geox',
					'Ghost of Tsushima' => 'ghost-of-tsushima',
					'Gigoteuses' => 'gigoteuses',
					'Gillette Fusion' => 'gillette-fusion',
					'Gillette Mach3' => 'gillette-mach3',
					'Glaces' => 'glaces',
					'Glacières' => 'glacieres',
					'Glisse urbaine' => 'glisse-urbaine',
					'God of War' => 'god-of-war',
					'Google Chromecast' => 'google-chromecast',
					'Google Home' => 'google-home',
					'Google Home Max' => 'google-home-max',
					'Google Home Mini' => 'google-home-mini',
					'Google Nest Hub' => 'google-nest-hub',
					'Google Nest Mini' => 'google-nest-mini',
					'Google Pixel' => 'google-pixel',
					'Google Pixel 2' => 'google-pixel-2',
					'Google Pixel 2 XL' => 'google-pixel-2-xl',
					'Google Pixel 3' => 'google-pixel-3',
					'Google Pixel 3 XL' => 'google-pixel-3-xl',
					'Google Pixel 3a' => 'google-pixel-3a',
					'Google Pixel 4' => 'google-pixel-4',
					'Google Pixel 4 XL' => 'google-pixel-4xl',
					'Google Pixel 4a' => 'google-pixel-4a',
					'Google Pixel 5' => 'google-pixel-5',
					'Google Pixel XL' => 'google-pixel-xl',
					'GoPro' => 'gopro-hero',
					'GoPro Hero 9' => 'gopro-hero-9',
					'Gran Turismo' => 'gran-turismo',
					'Grille-pain' => 'grille-pain',
					'Grossesse &amp; maternité' => 'grossesse-maternite',
					'GTA' => 'gta',
					'GTA V' => 'gta-v',
					'GTX 1060' => 'nvidia-geforce-gtx-1060',
					'GTX 1070' => 'nvidia-geforce-gtx-1070',
					'GTX 1080' => 'nvidia-geforce-gtx-1080',
					'GTX 1080 Ti' => 'nvidia-geforce-gtx-1080-ti',
					'GTX 1650' => 'gtx-1650',
					'GTX 1660' => 'gtx-1660',
					'GTX 1660 Ti' => 'gtx-1660-ti',
					'Guerlain La Petite Robe Noire' => 'guerlain-petite-robe-noire',
					'Guirlandes lumineuses' => 'guirlandes-lumineuses',
					'Guitares' => 'guitares',
					'Gyropodes' => 'gyropodes',
					'Half Life' => 'half-life',
					'Half Life 2' => 'half-life-2',
					'Half Life Alyx' => 'half-life-alyx',
					'Halloween' => 'halloween',
					'Haltères &amp; poids' => 'halteres-et-poids',
					'Hama' => 'hama',
					'Hamacs' => 'hamacs',
					'Hand spinners' => 'hand-spinners',
					'Harnais pour chien' => 'harnais-pour-chien',
					'Harry Potter' => 'harry-potter',
					'Havaianas' => 'havaianas',
					'High-Tech' => 'high-tech',
					'High-tech &amp; informatique' => 'le-laboratoire-high-tech-informatique',
					'Hisense' => 'hisense',
					'Home Cinéma' => 'home-cinema',
					'Honor' => 'honor',
					'Honor 6X' => 'honor-6x',
					'Honor 8' => 'honor-8',
					'Honor 8 Pro' => 'honor-8-pro',
					'Honor 8X' => 'honor-8x',
					'Honor 8X Max' => 'honor-8x-max',
					'Honor 9' => 'honor-9',
					'Honor 10' => 'honor-10',
					'Honor 20' => 'honor-20',
					'Honor 20 Lite' => 'honor-20-lite',
					'Honor 20 Pro' => 'honor-20-pro',
					'Honor Band 5' => 'honor-band-5',
					'Honor MagicBook' => 'honor-magicbook',
					'Honor MagicWatch 2' => 'honor-magicwatch-2',
					'Honor View 20' => 'honor-view-20',
					'Horizon Zero Dawn' => 'horizon-zero-dawn',
					'Hôtels &amp; Hébergements' => 'hotels',
					'Hoverboards' => 'hoverboards',
					'HTC 10' => 'htc-10',
					'HTC Desire' => 'htc-desire',
					'HTC One M9' => 'htc-one-m9',
					'HTC U11' => 'htc-u11',
					'HTC U Play' => 'htc-u-play',
					'HTC U Ultra' => 'htc-u-ultra',
					'HTC Vive' => 'htc-vive',
					'Huawei' => 'huawei',
					'Huawei FreeBuds 3' => 'huawei-freebuds-3',
					'Huawei Mate 9' => 'huawei-mate-9',
					'Huawei Mate 10' => 'huawei-mate-10',
					'Huawei Mate 10 Pro' => 'huawei-mate-10-pro',
					'Huawei Mate 20' => 'huawei-mate-20',
					'Huawei Mate 20 Lite' => 'huawei-mate-20-lite',
					'Huawei Mate 20 Pro' => 'huawei-mate-20-pro',
					'Huawei Mate 20 RS' => 'huawei-mate-20-rs',
					'Huawei Mate 30' => 'huawei-mate-30',
					'Huawei Mate 30 Lite' => 'huawei-mate-30-lite',
					'Huawei Mate 30 Pro' => 'huawei-mate-30-pro',
					'Huawei P8 Lite' => 'huawei-p8-lite',
					'Huawei P9 Lite' => 'huawei-p9-lite',
					'Huawei P10' => 'huawei-p10',
					'Huawei P10 Lite' => 'huawei-p10-lite',
					'Huawei P10 Plus' => 'huawei-p10-plus',
					'Huawei P20' => 'huawei-p20',
					'Huawei P20 Lite' => 'huawei-p20-lite',
					'Huawei P20 Pro' => 'huawei-p20-pro',
					'Huawei P30' => 'huawei-p30',
					'Huawei P30 Lite' => 'huawei-p30-lite',
					'Huawei P30 Pro' => 'huawei-p30-pro',
					'Huawei P40' => 'huawei-p40',
					'Huawei P40 Lite' => 'huawei-p40-lite',
					'Huawei P40 Pro' => 'huawei-p40-pro',
					'Huawei Watch' => 'huawei-watch',
					'Huawei Watch 2' => 'huawei-watch-2',
					'Hubs' => 'hubs',
					'Hugo Boss Bottled' => 'hugo-boss-bottled',
					'Huile moteur' => 'huile-moteur',
					'Hygiène &amp; soins' => 'hygiene-soins',
					'Hygiène de la maison' => 'hygiene-de-la-maison',
					'Hygiène des bébés' => 'hygiene-des-bebes',
					'Hygiène intime' => 'hygiene-intime',
					'iMac' => 'mac-de-bureau',
					'iMac 2021' => 'imac-2021',
					'Image, son, photo' => 'le-laboratoire-audiovisuel',
					'Impressions photo' => 'impressions-photo',
					'Imprimantes' => 'imprimantes',
					'Imprimantes 3D' => 'imprimantes-3d',
					'Imprimantes Brother' => 'imprimantes-brother',
					'Imprimantes Canon' => 'imprimantes-canon',
					'Imprimantes Epson' => 'imprimantes-epson',
					'Imprimantes HP' => 'imprimantes-hp',
					'Imprimantes laser' => 'imprimantes-laser',
					'Imprimantes multifonctions' => 'imprimantes-multifonctions',
					'Informatique' => 'informatique',
					'Instax Mini' => 'instax-mini',
					'Instruments de musique' => 'instruments-de-musique',
					'Intel i5' => 'intel-i5',
					'Intel i7' => 'intel-i7',
					'Intel i9' => 'intel-i9',
					'iPad' => 'apple-ipad',
					'iPad 2019' => 'ipad-2019',
					'iPad 2020' => 'ipad-2020',
					'iPad Air' => 'ipad-air',
					'iPad Air 2019' => 'ipad-air-2019',
					'iPad Air 2020' => 'ipad-air-2020',
					'iPad Mini' => 'apple-ipad-mini',
					'iPad Pro' => 'apple-ipad-pro',
					'iPad Pro 11' => 'ipad-pro-11',
					'iPad Pro 12.9' => 'ipad-pro-12-9',
					'iPad Pro 2020' => 'ipad-pro-2020',
					'iPhone' => 'apple-iphone',
					'iPhone 6' => 'apple-iphone-6',
					'iPhone 7' => 'apple-iphone-7',
					'iPhone 7 Plus' => 'apple-iphone-7-plus',
					'iPhone 8' => 'apple-iphone-8',
					'iPhone 8 Plus' => 'apple-iphone-8-plus',
					'iPhone 11' => 'iphone-11',
					'iPhone 11 Pro' => 'iphone-11-pro',
					'iPhone 11 Pro Max' => 'iphone-11-pro-max',
					'iPhone 12' => 'iphone-12',
					'iPhone 12 Mini' => 'iphone-12-mini',
					'iPhone 12 Pro' => 'iphone-12-pro',
					'iPhone 12 Pro Max' => 'iphone-12-pro-max',
					'iPhone SE' => 'apple-iphone-se',
					'iPhone X' => 'apple-iphone-x',
					'iPhone XR' => 'apple-iphone-xr',
					'iPhone XS' => 'apple-iphone-xs',
					'iPhone XS Max' => 'apple-iphone-xs-max',
					'iRobot Roomba' => 'irobot-roomba',
					'Isolation' => 'isolation',
					'Jabra Elite 75t' => 'jabra-elite-75t',
					'Jabra Elite 85h' => 'jabra-elite-85h',
					'Jabra Elite 85t' => 'jabra-elite-85t',
					'Jabra Elite Active 65t' => 'jabra-elite-active-65t',
					'Jacuzzis' => 'jacuzzis',
					'Jardin' => 'jardin',
					'Jardin &amp; bricolage' => 'jardin-bricolage',
					'Jardinage' => 'entretien-du-jardin',
					'JBL' => 'jbl',
					'JBL Charge 4' => 'jbl-charge-4',
					'JBL Flip' => 'jbl-flip',
					'JBL GO' => 'jbl-go',
					'JBL Xtreme 2' => 'jbl-xtreme-2',
					'Jeans' => 'jeans',
					'Jets dentaires' => 'jets-dentaires',
					'Jeux &amp; jouets' => 'jeux-jouets',
					'Jeux &amp; sports de café' => 'jeux-sports-cafe-bar',
					'Jeux d&#039;adresse' => 'jeux-adresse',
					'Jeux d&#039;apprentissage' => 'jeux-d-apprentissage',
					'Jeux d&#039;eau' => 'jeux-jouets-eau',
					'Jeux d&#039;extérieur' => 'jeux-d-exterieur',
					'Jeux d&#039;imitation' => 'jeux-d-imitation',
					'Jeux de cartes et de plateau' => 'jeux-cartes-plateau-societe',
					'Jeux de construction' => 'jeux-de-construction',
					'Jeux de hasard &amp; paris' => 'jeux-et-paris',
					'Jeux de société' => 'jeux-de-societe',
					'Jeux Nintendo 3DS' => 'jeux-3ds',
					'Jeux Nintendo Switch' => 'jeux-nintendo-switch',
					'Jeux PC' => 'jeux-pc',
					'Jeux PC dématérialisés' => 'jeux-pc-dematerialises',
					'Jeux pour bébés' => 'jeux-pour-bebes',
					'Jeux PS4' => 'jeux-playstation-4',
					'Jeux PS4 dématérialisés' => 'jeux-ps4-dematerialises',
					'Jeux PS5' => 'jeux-playstation-5',
					'Jeux PS5 dématérialisés' => 'jeux-playstation-5-dematerialises',
					'Jeux PS Plus' => 'jeux-ps-plus',
					'Jeux vidéo' => 'jeux-video',
					'Jeux VR' => 'jeux-vr',
					'Jeux Wii U' => 'jeux-wii-u',
					'Jeux Xbox One' => 'jeux-xbox-one',
					'Jeux Xbox One dématérialisés' => 'jeux-xbox-dematerialises',
					'Jeux Xbox Series X' => 'jeux-xbox-series-x',
					'Jeux Xbox with Gold' => 'jeux-xbox-with-gold',
					'Jouets' => 'jouets',
					'Jouets pour chat' => 'jouets-pour-chat',
					'Jouets pour chien' => 'jouets-pour-chien',
					'Journaux numériques' => 'journaux-numeriques',
					'Journaux papier' => 'journaux-papier',
					'Joy-Con' => 'manettes-nintendo-switch-joy-con',
					'Jungle Speed' => 'jungle-speed',
					'Just Cause' => 'just-cause',
					'Just Cause 3' => 'just-cause-3',
					'Just Cause 4' => 'just-cause-4',
					'Kärcher' => 'karcher',
					'Kaspersky' => 'kaspersky',
					'Kinder' => 'kinder',
					'Kindle Oasis' => 'kindle-oasis',
					'Kindle Paperwhite' => 'kindle-paperwhite',
					'Kindle Voyage' => 'kindle-voyage',
					'Kingdom Hearts' => 'kingdom-hearts',
					'Kingdom Hearts 3' => 'kingdom-hearts-3',
					'Kingston HyperX Cloud II' => 'kingston-hyperx-cloud-2',
					'Kits premiers secours' => 'premiers-secours',
					'Kobo' => 'kobo',
					'Kobo Aura 2' => 'kobo-aura-2',
					'Kobo Aura H2o' => 'kobo-aura-h2o',
					'Kobo Aura One' => 'kobo-aura-one',
					'L&#039;annale du destin' => 'l-annale-du-destin',
					'L&#039;ombre de la guerre' => 'l-ombre-de-la-guerre',
					'L&#039;ombre du Mordor' => 'l-ombre-du-mordor',
					'Lacoste' => 'lacoste',
					'Lampadaires' => 'lampadaires',
					'Lampes' => 'lampes',
					'Lampes de table' => 'lampes-de-table',
					'Lampes solaires' => 'lampes-solaires',
					'Lancôme La Vie est Belle' => 'lancome-la-vie-est-belle',
					'Lapeyre' => 'lapeyre',
					'La Terre du Milieu' => 'la-terre-du-milieu',
					'Lavage auto' => 'lavage-auto',
					'Lavazza' => 'lavazza',
					'Lave-linge' => 'lave-linge',
					'Lave-linge frontal' => 'lave-linge-frontal',
					'Lave-linge séchant' => 'lave-linge-sechant',
					'Lave-linge top' => 'lave-linge-top',
					'Lave-vaisselle' => 'lave-vaisselle',
					'Lay-Z-Spa' => 'lay-z-spa',
					'Leasing voiture' => 'leasing-voiture',
					'Le bâton de la vérité' => 'le-baton-de-la-verite',
					'Lecteurs Blu-Ray' => 'lecteurs-blu-ray',
					'Lecteurs CD' => 'lecteurs-cd',
					'Lecteurs DVD' => 'lecteurs-dvd',
					'Lego' => 'lego',
					'Lego Architecture' => 'lego-architecture',
					'Lego Batman' => 'lego-batman',
					'Lego City' => 'lego-city',
					'Lego Creator' => 'lego-creator',
					'Lego Dimensions' => 'lego-dimensions',
					'Lego Duplo' => 'lego-duplo',
					'Lego Friends' => 'lego-friends',
					'Lego Harry Potter' => 'lego-harry-potter',
					'Lego Ideas' => 'lego-ideas',
					'Lego Marvel' => 'lego-marvel',
					'Lego Nexo Knights' => 'lego-nexo-knights',
					'Lego Ninjago' => 'lego-ninjago',
					'Lego Star Wars' => 'lego-star-wars',
					'Lego Technic' => 'lego-technic',
					'Lenovo' => 'lenovo',
					'Lenovo IdeaPad' => 'lenovo-ideapad',
					'Lenovo K6 Note' => 'lenovo-k6-note',
					'Lenovo P8' => 'lenovo-p8',
					'Lenovo Tab 3' => 'lenovo-tab-3',
					'Lenovo Tab 4' => 'lenovo-tab-4',
					'Lenovo ThinkPad' => 'lenovo-thinkpad',
					'Lenovo Yoga' => 'lenovo-yoga',
					'Lenovo Yoga Tab 3' => 'lenovo-yoga-tab-3',
					'Lentilles de contact' => 'lentilles-de-contact',
					'Le Seigneur des anneaux' => 'le-seigneur-des-anneaux',
					'Les Sims' => 'les-sims',
					'Les Sims 4' => 'les-sims-4',
					'Lessive' => 'lessive',
					'Levi&#039;s' => 'levi-s',
					'LG' => 'lg',
					'LG G4' => 'lg-g4',
					'LG G5' => 'lg-g5',
					'LG G6' => 'lg-g6',
					'LG OLED TV' => 'lg-oled-tv',
					'LG Q6' => 'lg-q6',
					'LG Q8' => 'lg-q8',
					'Life is Strange' => 'life-is-strange',
					'Linge de maison' => 'linge-de-maison',
					'Lingerie' => 'lingerie',
					'Lingettes désinfectantes' => 'lingettes-desinfectantes',
					'Lingettes pour bébés' => 'lingettes-pour-bebes',
					'Liseuses' => 'liseuses',
					'Litière pour chat' => 'litiere-pour-chat',
					'Lits' => 'lits',
					'Lits pour bébé' => 'lits-pour-bebe',
					'Lits pour enfants' => 'lits-pour-enfants',
					'Little Nightmares' => 'little-nightmares',
					'Livraison de repas' => 'service-de-livraison-de-repas',
					'Livres &amp; littérature' => 'livres-litterature',
					'Livres &amp; Magazines' => 'livres',
					'Livres audio' => 'livres-audio',
					'Livres photo' => 'livres-photo',
					'Location de voiture' => 'location-de-voiture',
					'Logiciels' => 'logiciels',
					'Logiciels de sécurité' => 'logiciels-de-securite',
					'Logiciels Microsoft' => 'logiciels-microsoft',
					'Logitech' => 'logitech',
					'Logitech G502' => 'logitech-g502',
					'Logitech G703' => 'logitech-g703',
					'Logitech G Pro X' => 'logitech-g-pro-x',
					'Logitech Harmony' => 'logitech-harmony',
					'Logitech MX Master' => 'logitech-mx-master',
					'Logitech MX Master 2S' => 'logitech-mx-master-2s',
					'Loisirs créatifs' => 'loisirs-creatifs',
					'Lolita Lempicka' => 'lolita-lempicka-premier-parfum',
					'Loup-Garou' => 'loup-garou',
					'Lubrifiants' => 'lubrifiants',
					'Luges' => 'luges',
					'Luigi&#039;s Mansion 3' => 'luigi-mansion-3',
					'Luminaires' => 'luminaires',
					'Lunettes de natation' => 'lunettes-de-natation',
					'Lunettes de soleil' => 'lunettes-de-soleil',
					'M&amp;M&#039;s' => 'metm-s',
					'MacBook' => 'macbook',
					'MacBook Air' => 'apple-macbook-air',
					'MacBook Pro' => 'apple-macbook-pro',
					'MacBook Pro 13' => 'macbook-pro-13',
					'MacBook Pro 15' => 'macbook-pro-15',
					'MacBook Pro 16' => 'macbook-pro-16',
					'Machines à café à dosettes' => 'machines-a-cafe-a-dosettes',
					'Machines à café en grain' => 'machines-a-cafe-en-grain',
					'Machines à coudre' => 'machines-a-coudre',
					'Machines à pain' => 'machines-a-pain',
					'Machines de sport' => 'machines-sport',
					'Machines Dolce Gusto' => 'machines-dolce-gusto',
					'Machines Nespresso' => 'machines-nespresso',
					'Machines Senseo' => 'machines-senseo',
					'Machines Tassimo' => 'machines-tassimo',
					'Mac mini' => 'mac-mini',
					'Madden NFL 20' => 'madden-nfl-20',
					'Magasins d&#039;usine' => 'magasins-usine',
					'Magazines' => 'magazines',
					'Maillots de bain' => 'maillots-de-bain',
					'Maillots de football' => 'maillots-de-football',
					'Maison &amp; Habitat' => 'maison-habitat',
					'Maisons de poupées' => 'maisons-poupees',
					'Makita' => 'makita',
					'Manettes' => 'manettes-accessoires-consoles',
					'Manettes DualSense' => 'manettes-playstation-5',
					'Manettes Nintendo Switch' => 'manettes-nintendo-switch',
					'Manettes Nintendo Switch Pro' => 'manettes-nintendo-switch-pro',
					'Manettes PlayStation 4' => 'manettes-playstation-4',
					'Manettes Xbox' => 'manettes-xbox',
					'Manettes Xbox One' => 'manettes-xbox-one',
					'Manettes Xbox One Elite' => 'manettes-xbox-one-elite',
					'Manettes Xbox Series X' => 'manettes-xbox-series-x',
					'Manix' => 'manix',
					'Manteaux' => 'manteaux',
					'Maquillage' => 'maquillage',
					'Marchands et leurs offres' => 'vos-avisdemandes-sur-les-marchands-et-leurs-offres',
					'Mario &amp; Sonic aux Jeux Olympiques de Tokyo 2020' => 'mario-sonic-jeux-olympiques-tokyo-2020',
					'Mario Kart' => 'mario-kart',
					'Marques' => 'marques',
					'Marteaux &amp; maillets' => 'marteaux-et-maillets',
					'Marvel&#039;s Avengers' => 'marvels-avengers',
					'Mascara' => 'mascara',
					'Masques cheveux' => 'masques-cheveux',
					'Masques de protection' => 'masques-de-protection-respiratoire',
					'Masques de ski' => 'masques-de-ski',
					'Mass Effect' => 'mass-effect',
					'Mass Effect: Andromeda' => 'mass-effect-andromeda',
					'Matchs de football' => 'matchs-de-football',
					'Matelas' => 'matelas',
					'Matelas gonflables' => 'matelas-gonflables',
					'Matériaux de construction' => 'materiaux-de-construction',
					'Matériel de ski' => 'materiel-de-ski',
					'Medion' => 'medion',
					'Metro' => 'metro',
					'Metro 2033' => 'metro-2033',
					'Metro Exodus' => 'metro-exodus',
					'Meubles pour aquarium' => 'meubles-pour-aquarium',
					'Meubles pour chat' => 'meubles-pour-chat',
					'Meubles salle de bain' => 'salle-de-bain',
					'Micro-casques gaming' => 'micro-casques-gaming',
					'Micro-ondes' => 'micro-ondes',
					'Microphones' => 'microphones',
					'Micro SD' => 'micro-sd',
					'Microsoft Flight Simulator' => 'microsoft-flight-simulator',
					'Microsoft Office' => 'microsoft-office',
					'Microsoft Surface Book' => 'microsoft-surface-book',
					'Microsoft Surface Pro 6' => 'microsoft-surface-pro-6',
					'Microsoft Surface Pro 7' => 'microsoft-surface-pro-7',
					'Miele' => 'miele',
					'Minecraft' => 'minecraft',
					'Mini PC' => 'mini-pc',
					'Mini réfrigérateurs' => 'mini-refrigerateurs',
					'Miroirs' => 'miroirs',
					'Mixeurs &amp; Blenders' => 'mixeurs-blenders',
					'Mixeurs plongeants' => 'mixeur-plongeant',
					'Mobilier' => 'mobilier',
					'Mobilier de bureau' => 'fournitures-de-bureau',
					'Mobilier de jardin' => 'mobilier-jardin',
					'Mobilier de salon' => 'mobilier-salon',
					'Mobvoi Ticwatch' => 'mobvoi-ticwatch',
					'Mode' => 'mode',
					'Mode &amp; accessoires' => 'mode-accessoires',
					'Mode &amp; beauté' => 'le-laboratoire-de-la-mode-beaute',
					'Mode enfants' => 'mode-enfants',
					'Mode femme' => 'mode-femme',
					'Mode homme' => 'mode-homme',
					'Modélisme' => 'modelisme',
					'Monopoly' => 'monopoly',
					'Montage PC' => 'montage-pc',
					'Montre connectée Amazfit' => 'montres-connectees-amazfit',
					'Montre connectée Garmin' => 'montres-connectees-garmin',
					'Montre connectée Honor' => 'montres-connectees-honor',
					'Montre connectée Samsung' => 'smartwatch-samsung',
					'Montres' => 'montres',
					'Montres connectées' => 'smartwatch',
					'Mortal Kombat' => 'mortal-kombat',
					'Mortal Kombat 11' => 'mortal-kombat-11',
					'Moto C Plus' => 'moto-c-plus',
					'Moto E4' => 'moto-e4',
					'Moto G5' => 'moto-g5',
					'Moto G5 Plus' => 'moto-g5-plus',
					'Moto G5S' => 'moto-g5s',
					'Moto G5S Plus' => 'moto-g5s-plus',
					'Moto G6' => 'moto-g6',
					'Moto G6 Play' => 'moto-g6-play',
					'Moto G6 Plus' => 'moto-g6-plus',
					'Moto G7 Play' => 'moto-g7-play',
					'Moto G7 Plus' => 'moto-g7-plus',
					'Moto G7 Power' => 'moto-g7-power',
					'Moto M' => 'moto-m',
					'Motorola' => 'motorola',
					'Moto Z2' => 'moto-z2',
					'Moto Z2 Force' => 'moto-z2-force',
					'Moto Z2 Play' => 'moto-z2-play',
					'Moto Z3' => 'moto-z3',
					'Moto Z3 Play' => 'moto-z3-play',
					'Moulinex' => 'moulinex',
					'Mousses à raser' => 'mousses-a-raser',
					'MSI' => 'msi',
					'Musées' => 'musees',
					'Musique' => 'musique',
					'NAS' => 'nas',
					'Natation' => 'natation',
					'Nature &amp; sports d&#039;hiver' => 'nature-sports-hiver',
					'Navigation' => 'navigation',
					'NBA 2K' => 'nba-2k',
					'NBA 2K20' => 'nba-2k20',
					'NERF' => 'nerf',
					'Nescafé' => 'nescafe',
					'Nespresso' => 'nespresso',
					'Nest Learning Thermostat' => 'nest-learning-thermostat',
					'Nest Protect' => 'nest-protect',
					'Netflix' => 'netflix',
					'Nettoyeurs haute-pression' => 'nettoyeurs-haute-pression',
					'Nettoyeurs haute pression Karcher' => 'nettoyeurs-haute-pression-karcher',
					'Nettoyeurs vapeur' => 'nettoyeurs-vapeur',
					'New Balance' => 'new-balance',
					'New Balance 574' => 'new-balance-574',
					'NHL 20' => 'nhl-20',
					'Nike' => 'nike',
					'Nike Air Force' => 'nike-air-force',
					'Nike Air Jordan' => 'nike-air-jordan',
					'Nike Air Max' => 'nike-air-max',
					'Nike Air Max 90' => 'nike-air-max-90',
					'Nike Air Max 200' => 'nike-air-max-200',
					'Nike Air Max 270' => 'nike-air-max-270',
					'Nike Air Max 720' => 'nike-air-max-720',
					'Nike Free' => 'nike-free',
					'Nike Huarache' => 'nike-huarache',
					'Nike Roshe Run' => 'nike-roshe-run',
					'Nikon' => 'nikon',
					'Nikon D3500' => 'nikon-d3500',
					'Ni no Kuni' => 'ni-no-kuni',
					'Ni No Kuni: Wrath of the White Witch' => 'ni-no-kuni-wrath-white-witch',
					'Ni No Kuni II: Revenant Kingdom' => 'ni-no-kuni-2-revenant-kingdom',
					'Nintendo' => 'nintendo',
					'Nioh' => 'nioh',
					'Nivea' => 'nivea',
					'Nocciolata' => 'nocciolata',
					'Nokia' => 'nokia',
					'Nokia 5' => 'nokia-5',
					'Nokia 6' => 'nokia-6',
					'Nokia 8' => 'nokia-8',
					'Nokia 9 PureView' => 'nokia-9-pureview',
					'Nougats' => 'nougats',
					'Nourriture pour chat' => 'nourriture-pour-chat',
					'Nourriture pour chien' => 'nourriture-pour-chien',
					'Nourriture pour poissons' => 'nourriture-pour-poissons',
					'Nutella' => 'nutella',
					'Nvidia' => 'nvidia',
					'Nvidia GeForce' => 'nvidia-geforce',
					'Nvidia Shield' => 'nvidia-shield',
					'Objectifs' => 'objectifs',
					'Objets connectés' => 'objets-connectes',
					'Oculus Go' => 'oculus-go',
					'Oculus Rift' => 'oculus-rift',
					'Oiseaux' => 'oiseaux',
					'One Piece: Pirate Warriors' => 'one-piece-pirate-warriors',
					'OnePlus 5' => 'oneplus-5',
					'OnePlus 5T' => 'oneplus-5t',
					'OnePlus 6' => 'oneplus-6',
					'OnePlus 6T' => 'oneplus-6t',
					'OnePlus 7' => 'oneplus-7',
					'OnePlus 7 Pro' => 'oneplus-7-pro',
					'OnePlus 7T' => 'oneplus-7t',
					'OnePlus 7T Pro' => 'oneplus-7t-pro',
					'OnePlus 8' => 'oneplus-8',
					'OnePlus 8 Pro' => 'oneplus-8-pro',
					'OnePlus 8T' => 'oneplus-8t',
					'OnePlus 9' => 'oneplus-9',
					'OnePlus 9 Pro' => 'oneplus-9-pro',
					'OnePlus Nord' => 'oneplus-nord',
					'Onkyo' => 'onkyo',
					'Oppo Find X2 Lite' => 'oppo-find-x2-lite',
					'Oppo Find X2 Neo' => 'oppo-find-x2-neo',
					'Oppo Find X2 Pro' => 'oppo-find-x2-pro',
					'Oppo Reno' => 'oppo-reno',
					'Optique' => 'optique',
					'Oral-B' => 'oral-b',
					'Ordinateurs de bureau' => 'ordinateurs-de-bureau',
					'Ordinateurs tout-en-un' => 'pc-de-bureau-complets',
					'Oreillers' => 'oreillers',
					'Osram Smart+' => 'osram-smart-plus',
					'Outillage' => 'outillage',
					'Outils à main' => 'outils-main',
					'Outils de jardinage' => 'outils-de-jardinage',
					'Outils électriques' => 'outils-electriques',
					'Overwatch' => 'overwatch',
					'Packs clavier-souris' => 'packs-clavier-souris',
					'Packs consoles' => 'packs-consoles',
					'Paco Rabanne Invictus' => 'paco-rabanne-invictus',
					'Paco Rabanne Lady Million' => 'paco-rabanne-lady-million',
					'Paco Rabanne One Million' => 'paco-rabanne-one-million',
					'Pain &amp; pâtisseries' => 'pain-patisseries',
					'Pampers' => 'pampers',
					'Panasonic' => 'panasonic',
					'Panasonic Lumix' => 'panasonic-lumix',
					'Panier Plus' => 'panier-plus',
					'Pantalons' => 'pantalons',
					'Papeterie' => 'papeterie',
					'Papeterie et bureautique' => 'papeterie-bureautique',
					'Papier bureautique' => 'papier-bureautique',
					'Papier peint' => 'papier-peint',
					'Papier toilette' => 'papier-toilette',
					'Parapharmacie' => 'parapharmacie',
					'Parasols' => 'parasols',
					'Parc Astérix' => 'parc-asterix',
					'Parcs d&#039;attraction' => 'parcs-d-attraction',
					'Parfums' => 'parfums',
					'Parfums femme' => 'parfums-femme',
					'Parfums homme' => 'parfums-homme',
					'Parkas' => 'parkas',
					'Parrot' => 'parrot',
					'Partitions' => 'partitions',
					'Pâtée pour chat' => 'patee-pour-chat',
					'Pâtée pour chien' => 'patee-pour-chien',
					'Pâtes à tartiner' => 'pates-tartiner',
					'Pâtisserie' => 'patisserie',
					'PC Barebones' => 'pc-barebones',
					'PC gamer fixe' => 'pc-gamer-complets',
					'PC gaming' => 'pc-gaming',
					'PC hybrides' => 'hybrides',
					'PC Microsoft Surface' => 'pc-microsoft-surface',
					'PC portables' => 'pc-portables',
					'PC portables Acer' => 'pc-portables-acer',
					'PC portables ASUS' => 'pc-portables-asus',
					'PC portables Dell' => 'pc-portables-dell',
					'PC portables gaming' => 'portables-gamer',
					'PC portables Honor' => 'pc-portables-honor',
					'PC portables HP' => 'pc-portables-hp',
					'PC portables Lenovo' => 'pc-portables-lenovo',
					'PC portables Lenovo Legion' => 'lenovo-legion',
					'PC portables Xiaomi' => 'pc-portables-xiaomi',
					'Pêche' => 'peche',
					'Peignes &amp; brosses à cheveux' => 'peignes-et-brosses-a-cheveux',
					'Peignoirs' => 'peignoirs',
					'Peintures' => 'peintures',
					'Peluches' => 'peluches',
					'Perceuses' => 'perceuses',
					'Périphériques PC' => 'peripheriques-pc',
					'Persona 5' => 'persona-5',
					'Persona 5 Royal' => 'persona-5-royal',
					'PES' => 'pro-evolution-soccer',
					'Pèse-personnes' => 'pese-personnes',
					'Petites voitures' => 'petites-voitures',
					'Pharmacie &amp; parapharmacie' => 'pharmacie-parapharmacie',
					'Philips' => 'philips',
					'Philips Hue' => 'philips-hue',
					'Philips Hue E14' => 'philips-hue-e14',
					'Philips Hue E27' => 'philips-hue-e27',
					'Philips Hue Go' => 'philips-hue-go',
					'Philips Hue GU10' => 'philips-hue-gu10',
					'Philips Hue LightStrip' => 'philips-hue-lightstrip',
					'Philips Hue Play HDMI Sync Box' => 'philips-hue-play-hdmi-sync-box',
					'Philips Lumea' => 'philips-lumea',
					'Philips OneBlade' => 'philips-one-blade',
					'Philips Sonicare' => 'philips-sonicare',
					'Photo' => 'photo',
					'Pièces auto' => 'pieces-auto',
					'Pièces moto' => 'pieces-moto',
					'Pièces vélo' => 'pieces-velo',
					'Piles' => 'piles',
					'Piles rechargeables' => 'piles-rechargeables',
					'Pinceaux maquillage' => 'pinceaux-maquillage',
					'Pinces' => 'pinces',
					'Ping-pong' => 'ping-pong',
					'Pioneer' => 'pioneer',
					'Piscines' => 'piscines',
					'Pizza' => 'pizza',
					'Places de cinéma' => 'places-de-cinema',
					'Plafonniers' => 'plafonniers',
					'Plancha' => 'planchas',
					'Plantes &amp; semis' => 'plantes',
					'Plaques de cuisson' => 'plaques-de-cuisson',
					'Platines vinyle' => 'platines-vinyle',
					'Plats &amp; moules' => 'plats-et-moules',
					'PlayerUnknown&#039;s Battlegrounds' => 'playerunknown-s-battleground',
					'Playmobil' => 'playmobil',
					'PlayStation' => 'playstation',
					'Pneus' => 'pneus',
					'PocketBook' => 'pocketbook',
					'PocketBook Touch Lux 3' => 'pocketbook-touch-lux-3',
					'POCO F2 Pro' => 'poco-f2-pro',
					'POCO F3' => 'poco-f3',
					'POCO M3' => 'poco-m3',
					'POCO X3' => 'poco-x3',
					'POCO X3 Pro' => 'poco-x3-pro',
					'Poêles' => 'poeles',
					'Pokémon' => 'pokemon',
					'Pokémon: Let&#039;s Go' => 'pokemon-letsgo',
					'Pokémon Épée et Bouclier' => 'pokemon-epee-bouclier',
					'Pokémon Tournament' => 'pokemon-tournament',
					'Pokémon Ultra Sun / Moon' => 'pokemon-ultra-sun-moon',
					'Polaroid' => 'polaroid',
					'Polos' => 'polos',
					'Pompes à vélo' => 'pompes-velo',
					'Porte-bébé' => 'porte-bebe',
					'Portefeuilles' => 'portefeuilles',
					'Posters' => 'posters',
					'Potager' => 'potager',
					'Pots &amp; cache-pots' => 'pots-et-cache-pots',
					'Poubelles' => 'poubelles',
					'Poulaillers' => 'poulaillers',
					'Poupées' => 'poupees',
					'Poussettes' => 'poussettes-bebe',
					'Présentez-vous !' => 'mieux-se-connaitre-presentez-vous',
					'Préservatifs' => 'preservatifs',
					'Princesse Tam-Tam' => 'princesse-tam-tam',
					'Prises connectées' => 'prises-connectees',
					'Processeurs' => 'processeurs',
					'Produit pour lentilles' => 'produit-pour-lentilles',
					'Produits de massage' => 'produits-de-massage',
					'Produits frais' => 'produits-frais',
					'Produits reconditionnés' => 'reconditionne',
					'Produits vétérinaires' => 'produits-veterinaires',
					'Programme d&#039;Entraînement Cérébral du Dr. Kawashima' => 'dr-kawashima-brain-training',
					'Project Cars 2' => 'project-cars-2',
					'Protection de la maison' => 'protection-de-la-maison',
					'Protections intimes' => 'protections-intimes',
					'Protection solaire' => 'protection-solaire',
					'Puériculture' => 'puericulture',
					'Pulls' => 'pulls',
					'Puma' => 'puma',
					'Purificateurs d&#039;air' => 'purificateurs-d-air',
					'Purina' => 'purina',
					'Puzzles' => 'puzzles',
					'Pyjamas' => 'pyjamas',
					'Pyjamas &amp; chemises de nuit' => 'pyjamas-chemises-de-nuit',
					'Pyjamas pour bébés' => 'pyjamas-pour-bebes',
					'Qobuz' => 'qobuz',
					'Quiksilver' => 'quiksilver',
					'Radiateurs' => 'radiateurs',
					'Ralph Lauren' => 'ralph-lauren',
					'RAM' => 'ram',
					'Randonnée' => 'randonnee',
					'Raquettes de ping-pong' => 'raquettes-de-ping-pong',
					'Raquettes de tennis' => 'raquettes-de-tennis',
					'Rasage et épilation' => 'rasage-epilation',
					'Rasoirs Braun' => 'rasoirs-braun',
					'Rasoirs électriques' => 'rasoirs-electriques',
					'Rasoirs Gillette' => 'gillette',
					'Rasoirs manuels' => 'rasoirs-manuels',
					'Rasoirs Philips' => 'rasoirs-philips',
					'Rasoirs Wilkinson' => 'rasoirs-wilkinson-sword',
					'Raspberry Pi' => 'raspberry-pi',
					'Ray-Ban' => 'ray-ban',
					'Razer' => 'razer',
					'Razer DeathAdder' => 'razer-deathadder',
					'Realme 5 Pro' => 'realme-5-pro',
					'Realme X2 Pro' => 'realme-x2-pro',
					'Red Dead Redemption' => 'red-dead-redemption',
					'Red Dead Redemption 2' => 'red-dead-redemption-2',
					'Réductions étudiants &amp; jeunes' => 'reductions-etudiants-et-jeunes',
					'Reebok' => 'reebok',
					'Reebok Club C' => 'reebok-club-c',
					'Réfrigérateurs' => 'refrigerateurs',
					'Réfrigérateurs américains' => 'refrigerateurs-americains',
					'Refroidissement PC' => 'refroidissement-pc',
					'Réhausseurs' => 'rehausseurs',
					'Remington' => 'remington',
					'Repas de fête' => 'repas-fete-reveillon',
					'Repassage' => 'repassage',
					'Répéteurs' => 'repeteurs',
					'Réseau' => 'reseau',
					'Resident Evil' => 'resident-evil',
					'Resident Evil 3' => 'resident-evil-3',
					'Resident Evil 7' => 'resident-evil-7',
					'Restaurants' => 'restaurants',
					'Revêtements de sols' => 'revetements-de-sols',
					'Revêtements muraux' => 'revetements-muraux',
					'Rhum' => 'rhum',
					'Richelieus' => 'richelieus',
					'Ring Fit Adventure' => 'ring-fit-adventure',
					'Risk' => 'risk',
					'Robes &amp; jupes' => 'robes-et-jupes',
					'Roborock' => 'roborock',
					'Roborock S5 MAX' => 'roborock-s5-max',
					'Roborock S6' => 'roborock-s6',
					'Robots cuiseurs' => 'robots-cuiseurs',
					'Robots ménagers' => 'robots-menagers',
					'Robot tondeuse' => 'robot-tondeuse',
					'ROCCAT' => 'roccat',
					'Rollers' => 'rollers',
					'Rouges à lèvres' => 'rouges-a-levres',
					'Routeurs' => 'routeurs',
					'Rowenta' => 'rowenta',
					'Royal Canin' => 'royal-canin',
					'RTX 2060' => 'rtx-2060',
					'RTX 2070' => 'rtx-2070',
					'RTX 2080' => 'rtx-2080',
					'RTX 2080 Ti' => 'rtx-2080-ti',
					'RTX 3070' => 'rtx-3070',
					'RTX 3080' => 'rtx-3080',
					'RTX 3090' => 'rtx-3090',
					'RX 480' => 'rx-480',
					'RX 580' => 'rx-580',
					'RX 590' => 'radeon-rx-590',
					'RX Vega 56' => 'rx-vega-56',
					'RX Vega 64' => 'rx-vega-64',
					'Sacs à déjections' => 'sacs-a-dejections',
					'Sacs à dos' => 'sacs-a-dos',
					'Sacs à langer' => 'sacs-a-langer',
					'Sacs à main' => 'sacs-a-main',
					'Sacs bandoulière' => 'sacs-bandouliere',
					'Sacs de couchage' => 'sacs-de-couchage',
					'Sacs de randonnée' => 'sacs-de-randonnee',
					'Sacs de sport' => 'sacs-de-sport',
					'Sacs de voyage' => 'sacs-de-voyage',
					'Salle à manger' => 'salle-manger',
					'Samsonite' => 'samsonite',
					'Samsung' => 'samsung',
					'Samsung Galaxy A5' => 'samsung-galaxy-a5',
					'Samsung Galaxy A50' => 'samsung-galaxy-a50',
					'Samsung Galaxy A51' => 'samsung-galaxy-a51',
					'Samsung Galaxy A51 5G' => 'samsung-galaxy-a51-5g',
					'Samsung Galaxy A70' => 'samsung-galaxy-a70',
					'Samsung Galaxy A80' => 'samsung-galaxy-a80',
					'Samsung Galaxy Buds' => 'samsung-galaxy-buds',
					'Samsung Galaxy Buds+' => 'samsung-galaxy-buds-plus',
					'Samsung Galaxy Buds Live' => 'samsung-galaxy-buds-live',
					'Samsung Galaxy Buds Pro' => 'samsung-galaxy-buds-pro',
					'Samsung Galaxy Fold' => 'samsung-galaxy-fold',
					'Samsung Galaxy Note 8' => 'samsung-galaxy-note-8',
					'Samsung Galaxy Note 9' => 'samsung-galaxy-note-9',
					'Samsung Galaxy Note 10' => 'samsung-galaxy-note-10',
					'Samsung Galaxy Note 10 Lite' => 'samsung-galaxy-note-10-lite',
					'Samsung Galaxy Note 10 Plus' => 'samsung-galaxy-note-10-plus',
					'Samsung Galaxy Note20' => 'samsung-galaxy-note-20',
					'Samsung Galaxy Note20 Ultra' => 'samsung-galaxy-note-20-ultra',
					'Samsung Galaxy S7' => 'samsung-galaxy-s7',
					'Samsung Galaxy S7 Edge' => 'samsung-galaxy-s7-edge',
					'Samsung Galaxy S8' => 'samsung-galaxy-s8',
					'Samsung Galaxy S8+' => 'samsung-galaxy-s8plus',
					'Samsung Galaxy S9' => 'samsung-galaxy-s9',
					'Samsung Galaxy S9 Plus' => 'samsung-galaxy-s9-plus',
					'Samsung Galaxy S10' => 'samsung-galaxy-s10',
					'Samsung Galaxy S10 Lite' => 'samsung-galaxy-s10-lite',
					'Samsung Galaxy S10+' => 'samsung-galaxy-s10-plus',
					'Samsung Galaxy S10e' => 'samsung-galaxy-s10e',
					'Samsung Galaxy S20' => 'samsung-galaxy-s20',
					'Samsung Galaxy S20 FE' => 'samsung-galaxy-s20-fe',
					'Samsung Galaxy S20 Ultra' => 'samsung-galaxy-s20-ultra',
					'Samsung Galaxy S20+' => 'samsung-galaxy-s20-plus',
					'Samsung Galaxy S21 5G' => 'samsung-galaxy-s21-5g',
					'Samsung Galaxy S21 Ultra 5G' => 'samsung-galaxy-s21-ultra-5g',
					'Samsung Galaxy S21+ 5G' => 'samsung-galaxy-s21-plus-5g',
					'Samsung Galaxy Tab A' => 'samsung-galaxy-tab-a',
					'Samsung Galaxy Tab S2' => 'samsung-galaxy-tab-s2',
					'Samsung Galaxy Tab S3' => 'samsung-galaxy-tab-s3',
					'Samsung Galaxy Tab S4' => 'samsung-galaxy-tab-s4',
					'Samsung Galaxy Tab S5e' => 'samsung-galaxy-tab-s5e',
					'Samsung Galaxy Tab S6' => 'samsung-galaxy-tab-s6',
					'Samsung Galaxy Tab S7' => 'samsung-galaxy-tab-s7',
					'Samsung Galaxy Watch' => 'samsung-galaxy-watch',
					'Samsung Galaxy Watch3' => 'samsung-galaxy-watch-3',
					'Samsung Galaxy Watch Active 2' => 'samsung-galaxy-watch-active2',
					'Samsung Galaxy Z Flip' => 'galaxy-z-flip',
					'Samsung Gear' => 'samsung-gear',
					'Samsung Gear S3' => 'samsung-gear-s3',
					'Samsung Gear VR' => 'samsung-gear-vr',
					'Sandales' => 'sandales',
					'SanDisk' => 'sandisk',
					'Sanitaires et robinetterie' => 'sanitaires-robinetterie',
					'Santé &amp; Cosmétiques' => 'sante-et-cosmetiques',
					'Sapins de Noël' => 'sapins-noel',
					'Savons' => 'savons',
					'Scanners' => 'scanners',
					'Scanners A3' => 'scanners-a3',
					'Scanners A4' => 'scanners-a4',
					'Scies' => 'scies',
					'Scooters' => 'scooters',
					'Seagate' => 'seagate',
					'Sécateurs' => 'secateurs',
					'Sèche-cheveux' => 'seche-cheveux',
					'Sèche-linge' => 'seche-linge',
					'Seiko' => 'seiko',
					'Séjours' => 'sejours',
					'Sekiro: Shadows Die Twice' => 'sekiro',
					'Semis &amp; graines' => 'semis-et-graines',
					'Sennheiser' => 'sennheiser',
					'Senseo' => 'senseo',
					'Séries TV' => 'series-tv',
					'Service &amp; réparation auto-moto' => 'service-reparation-auto-moto',
					'Services' => 'services-divers',
					'Services auto' => 'services-auto',
					'Services de livraison' => 'services-livraisons',
					'Services moto' => 'services-moto',
					'Services photo' => 'services-photo',
					'Serviettes' => 'serviettes',
					'Serviettes hygiéniques' => 'serviettes-hygieniques',
					'Sextoys' => 'sextoys',
					'Shadow of the Colossus' => 'shadow-of-the-colossus',
					'Shadow of the Tomb Raider' => 'shadow-tomb-raider',
					'Shalimar' => 'shalimar',
					'Shampooings &amp; soins' => 'shampooings-et-soins',
					'Shenmue' => 'shenmue',
					'Shenmue I &amp; II' => 'shenmue-i-ii',
					'Shenmue III' => 'shenmue-iii',
					'Shorts' => 'shorts',
					'Shorts de bain' => 'shorts-de-bain',
					'Sièges auto' => 'sieges-auto',
					'Siemens' => 'siemens',
					'Skates &amp; longboards' => 'skates-et-longboards',
					'Skechers' => 'sketchers',
					'Ski' => 'ski',
					'Skyrim' => 'skyrim',
					'Slips &amp; boxers' => 'slips-et-boxers',
					'Smartphones' => 'smartphones',
					'Smartphones à moins de 100€' => 'smartphones-moins-de-100',
					'Smartphones à moins de 200€' => 'smartphones-moins-de-200',
					'Smartphones Android' => 'smartphones-android',
					'Smartphones Asus' => 'smartphones-asus',
					'Smartphones Google' => 'smartphones-google',
					'Smartphones Honor' => 'smartphones-honor',
					'Smartphones HTC' => 'smartphones-htc',
					'Smartphones Huawei' => 'smartphones-huawei',
					'Smartphones Lenovo Motorola' => 'smartphones-lenovo-motorola',
					'Smartphones LG' => 'smartphones-lg',
					'Smartphones Nokia' => 'smartphones-nokia',
					'Smartphones OnePlus' => 'smartphones-oneplus',
					'Smartphones Oppo' => 'smartphones-oppo',
					'Smartphones Realme' => 'smartphones-realme',
					'Smartphones Samsung' => 'smartphones-samsung',
					'Smartphones Sony' => 'smartphones-sony',
					'Smartphones Xiaomi' => 'smartphones-xiaomi',
					'Smartphones ZTE' => 'smartphones-zte',
					'Smart TV' => 'smart-tv',
					'Sneakers' => 'sneakers',
					'SodaStream' => 'sodastream',
					'Sofas gonflable' => 'sofas-gonflable',
					'Soin barbe et rasage' => 'soin-barbe-rasage',
					'Soin de la peau' => 'soin-peau',
					'Soin des cheveux' => 'soin-des-cheveux',
					'Soin des ongles' => 'soin-ongles',
					'Soins dentaires' => 'soins-dentaires',
					'Sonos' => 'sonos',
					'Sonos Beam' => 'sonos-beam',
					'Sonos Move' => 'sonos-move',
					'Sonos One' => 'sonos-one',
					'Sonos PLAY:1' => 'sonos-play-1',
					'Sonos PLAY:3' => 'sonos-play-3',
					'Sonos PLAY:5' => 'sonos-play-5',
					'Sonos PLAYBAR' => 'sonos-playbar',
					'Sony' => 'sony',
					'Sony PlayStation VR' => 'sony-playstation-vr',
					'Sony Pulse 3D sans fil' => 'casque-audio-sony-pulse-3d',
					'Sony WF-1000XM3' => 'sony-wf-1000xm3',
					'Sony WH-1000XM3' => 'sony-wh-1000xm3',
					'Sony WH-1000XM4' => 'sony-wh-1000xm4',
					'Sony Xperia XA1' => 'sony-xperia-xa1',
					'Sony Xperia X Compact' => 'sony-xperia-x-compact',
					'Sony Xperia XZ1' => 'sony-xperia-xz1',
					'Sony Xperia XZ1 Compact' => 'sony-xperia-xz1-compact',
					'Sony Xperia XZ Premium' => 'sony-xperia-xz-premium',
					'Sony Xperia Z3' => 'sony-xperia-z3',
					'Soulcalibur' => 'soulcalibur',
					'Souris' => 'souris',
					'Souris gamer' => 'souris-gamer',
					'Souris Logitech' => 'souris-logitech',
					'Souris sans fil' => 'souris-sans-fil',
					'Sous-vêtements' => 'sous-vetements',
					'Sous-vêtements de sport' => 'sous-vetements-de-sport',
					'South Park' => 'south-park',
					'Soutiens-gorge' => 'soutiens-gorge',
					'Spas' => 'spa',
					'Spectacles' => 'spectacles',
					'Spectacles &amp; Billetterie' => 'sorties',
					'Spectacles comiques' => 'spectacles-comiques',
					'Spectacles pour enfants' => 'spectacles-pour-enfants',
					'Sports &amp; plein air' => 'sports-plein-air',
					'Sports collectifs' => 'sports-collectifs',
					'Sports nautiques' => 'sports-nautiques',
					'Sportswear' => 'sportswear',
					'Spotify' => 'spotify',
					'SSD' => 'ssd',
					'Star Wars: Jedi Fallen Order' => 'star-wars-jedi-fallen-order',
					'Star Wars: Squadrons' => 'star-wars-squadrons',
					'Star Wars Battlefront' => 'star-wars-battlefront',
					'Stations météo' => 'stations-meteo',
					'Stickers muraux' => 'stickers-muraux',
					'Stihl' => 'stihl',
					'Stockage externe' => 'stockage',
					'Streaming' => 'streaming',
					'Streaming musical' => 'streaming-musical',
					'Streaming vidéo' => 'streaming-video',
					'Stylos' => 'stylos',
					'Sucettes' => 'sucettes',
					'Super Mario' => 'super-mario',
					'Super Mario 3D All-Stars' => 'super-mario-3d-all-stars',
					'Super Mario Maker 2' => 'super-mario-maker-2',
					'Super Mario Party' => 'super-mario-party',
					'Super Smash Bros. Ultimate' => 'super-smash-bros-ultimate',
					'Support GPS &amp; smartphone' => 'support-gps-et-smartphone',
					'Supports TV' => 'supports-tv',
					'Surface Pro 4' => 'surface-pro-4',
					'Surgelés' => 'surgeles',
					'Surveillance' => 'surveillance',
					'Suspensions' => 'suspensions',
					'Swatch' => 'swatch',
					'Switch réseau' => 'switch-reseau',
					'Systèmes d&#039;exploitation' => 'systemes-d-exploitation',
					'Systèmes multiroom' => 'systemes-multiroom',
					'T-shirts' => 't-shirts',
					'Tables' => 'tables',
					'Tables à langer' => 'tables-a-langer',
					'Tables à repasser' => 'tables-a-repasser',
					'Tables basses' => 'tables-basses',
					'Tables de camping' => 'tables-de-camping',
					'Tables de mixage' => 'tables-de-mixage',
					'Tables de ping-pong' => 'tables-ping-pong',
					'Tablettes' => 'tablettes',
					'Tablettes graphiques' => 'tablettes-graphiques',
					'Tablettes graphiques Huion' => 'huion',
					'Tablettes graphiques Wacom' => 'wacom',
					'Tablettes Huawei' => 'tablettes-huawei',
					'Tablettes Lenovo' => 'tablettes-lenovo',
					'Tablettes Microsoft Surface' => 'tablettes-microsoft-surface',
					'Tablettes Samsung' => 'tablettes-samsung',
					'Tablettes Xiaomi' => 'tablettes-xiaomi',
					'Tampons' => 'tampons',
					'Tapis' => 'tapis',
					'Tapis de souris' => 'tapis-de-souris',
					'Tassimo' => 'tassimo',
					'Taxis' => 'taxis',
					'Tefal' => 'tefal',
					'Tekken' => 'tekken',
					'Tekken 7' => 'tekken-7',
					'Télécommandes' => 'telecommandes',
					'Téléphones fixes' => 'telephones-fixes',
					'Téléphonie' => 'telephonie',
					'Téléviseurs' => 'televiseurs',
					'Tentes' => 'tentes',
					'Tentes Quechua' => 'tentes-quechua',
					'Têtes de brosse à dents de rechange' => 'tetes-de-brosse-a-dents-de-rechange',
					'Théâtre' => 'theatre',
					'The Last of Us' => 'the-last-of-us',
					'The Last of Us Part II' => 'the-last-of-us-part-2',
					'The Legend of Zelda' => 'the-legend-of-zelda',
					'The Legend of Zelda: Breath of the Wild' => 'zelda-breath-of-the-wild',
					'The Legend of Zelda: Link&#039;s Awakening' => 'legend-of-zelda-link-s-awakening',
					'The Legend of Zelda: Skyward Sword HD' => 'the-legend-of-zelda-skyward-sword-hd',
					'Thermomètres' => 'thermometres',
					'Thermomix' => 'thermomix',
					'Thermostats connectés' => 'thermostat-connecte',
					'Thés' => 'thes',
					'Thés glacés' => 'thes-glaces',
					'The Walking dead' => 'the-walking-dead',
					'The Witcher' => 'the-witcher',
					'The Witcher 3' => 'the-witcher-3',
					'Time&#039;s Up!' => 'time-s-up',
					'Tokyo Laundry' => 'tokyo-laundry',
					'Tomb Raider' => 'tomb-raider',
					'Tom Clancy&#039;s' => 'tom-clancy-s',
					'Tom Clancy&#039;s Ghost Recon: Wildlands' => 'tom-clancy-s-ghost-recon-wildlands',
					'Tom Clancy&#039;s Ghost Recon Breakpoint' => 'tom-clancy-s-ghost-recon-breakpoint',
					'Tom Clancy&#039;s The Division' => 'tom-clancy-s-the-division',
					'TomTom' => 'tomtom',
					'Tondeuses' => 'tondeuses',
					'Tondeuses à gazon' => 'tondeuses-a-gazon',
					'Toner' => 'toner',
					'Tongs' => 'tongs',
					'Torchons' => 'torchons',
					'Toshiba' => 'toshiba',
					'Total War' => 'total-war',
					'Total War: Warhammer' => 'total-war-warhammer',
					'Total War: Warhammer II' => 'total-war-warhammer-ii',
					'Tournevis' => 'tournevis-et-visseuses',
					'TP-Link' => 'tp-link',
					'Trains &amp; Bus' => 'trains-bus',
					'Trampolines' => 'trampolines',
					'Transats &amp; cosys' => 'transats-et-cosys',
					'Transport bébé' => 'poussettes',
					'Transport d&#039;animaux' => 'transport-d-animaux',
					'Transports en commun' => 'transports-en-commun',
					'Transports urbains' => 'transports-urbains',
					'Travaux &amp; matériaux' => 'travaux-materiaux',
					'Trépieds' => 'trepieds',
					'Trixie' => 'trixie',
					'Tronçonneuses' => 'tronconneuses',
					'Tropico' => 'tropico',
					'Tropico 6' => 'tropico-6',
					'Trottinettes' => 'trottinettes',
					'Trottinettes électriques' => 'trottinettes-electriques',
					'Trottinettes électriques en libre-service' => 'location-trottinettes-electriques',
					'Trottinettes Xiaomi' => 'trottinettes-xiaomi',
					'TV &amp; Vidéo' => 'tv-video',
					'TV 4K' => 'tv-4k',
					'TV 40&#039;&#039; à 64&#039;&#039;' => 'tv-40-pouces-a-64-pouces',
					'TV 65&#039;&#039; et plus' => 'tv-65-pouces-et-plus',
					'TV Hisense' => 'tv-hisense',
					'TV LG' => 'tv-lg',
					'TV OLED' => 'tv-oled',
					'TV Panasonic' => 'tv-panasonic',
					'TV Philips' => 'tv-philips',
					'TV Samsung' => 'tv-samsung',
					'TV Samsung QLED' => 'tv-samsung-qled',
					'TV Samsung The Frame' => 'tv-samsung-the-frame',
					'TV Sony' => 'tv-sony',
					'TV TCL' => 'tv-tcl',
					'TV Toshiba' => 'tv-toshiba',
					'TV Xiaomi' => 'tv-xiaomi',
					'UE Boom 2' => 'ue-boom-2',
					'UE Boom 3' => 'ue-boom-3',
					'UE Megaboom' => 'ue-megaboom',
					'UE Megaboom 3' => 'ue-megaboom-3',
					'UE Wonderboom' => 'ue-wonderboom',
					'Ultraportables' => 'ultraportables',
					'Uncharted' => 'uncharted',
					'Uncharted 4' => 'uncharted-4',
					'Uncharted: The Lost Legacy' => 'uncharted-the-lost-legacy',
					'Under Armour' => 'under-armour',
					'Until Dawn' => 'until-dawn',
					'Ustensiles de cuisine' => 'ustensiles-de-cuisine',
					'Ustensiles de cuisson' => 'ustensiles-de-cuisson',
					'Vacances et séjours' => 'vacances-sejours',
					'Vaisselle' => 'vaisselle',
					'Valises' => 'valises',
					'Valises cabine' => 'valises-cabine',
					'Valises rigides' => 'valises-rigides',
					'Vans Old Skool' => 'vans-old-skool',
					'Variétés &amp; revues' => 'varietes-et-revues',
					'Vases' => 'vases',
					'Veet' => 'veet',
					'Veilleuses' => 'veilleuses',
					'Vélos' => 'velos',
					'Vélos d&#039;appartement' => 'velos-d-appartement',
					'Vélos électriques' => 'velos-electriques',
					'Ventilateurs' => 'ventilateurs',
					'Ventirad' => 'ventirad',
					'Vernis à ongles' => 'vernis-a-ongles',
					'Verres' => 'verres',
					'Vestes' => 'vestes',
					'Vestes polaires' => 'vestes-polaires',
					'Vêtements d&#039;été' => 'vetements-d-ete',
					'Vêtements d&#039;hiver' => 'vetements-d-hiver',
					'Vêtements de grossesse' => 'vetements-de-grossesse',
					'Vêtements de montagne' => 'vetements-techniques',
					'Vêtements de running' => 'vetements-de-running',
					'Vêtements de ski' => 'vetements-de-ski',
					'Vêtements de sport' => 'vetements-de-sport',
					'Vêtements pour bébé' => 'vetements-pour-bebe',
					'Vidéoprojecteurs' => 'projecteurs',
					'Vidéoprojecteurs 3D' => 'videoprojecteurs-3d',
					'Vidéoprojecteurs Acer' => 'videoprojecteurs-acer',
					'Vidéoprojecteurs BenQ' => 'videoprojecteurs-benq',
					'Vidéoprojecteurs Epson' => 'videoprojecteurs-epson',
					'Vidéoprojecteurs HD' => 'videoprojecteurs-hd',
					'Vidéoprojecteurs LG' => 'videoprojecteurs-lg',
					'Vidéoprojecteurs Optoma' => 'videoprojecteurs-optoma',
					'Vins' => 'vins',
					'Visites &amp; patrimoine' => 'visites-et-patrimoine',
					'Visseuses' => 'visseuses',
					'VOD' => 'vod',
					'Voitures &amp; motos' => 'voitures-motos',
					'Voitures télécommandées' => 'voitures-telecommandees',
					'Volants' => 'volants-de-course',
					'Vols' => 'billets-d-avion',
					'Voyages' => 'voyages',
					'Voyages &amp; loisirs' => 'le-laboratoire-des-voyages-loisirs',
					'VPN' => 'vpn',
					'VTC' => 'vtc',
					'VTT' => 'vtt',
					'Wacom Cintiq' => 'cintiq',
					'Watch Dogs' => 'watch-dogs',
					'Watch Dogs 2' => 'watch-dogs-2',
					'Watch Dogs: Legion' => 'watch-dogs-legion',
					'Watercooling' => 'watercooling',
					'WD (Western Digital)' => 'western-digital',
					'Wearables' => 'wearables',
					'Webcams' => 'webcams',
					'Whey' => 'whey',
					'Whirlpool' => 'whirlpool',
					'Whiskas' => 'whiskas',
					'Whisky' => 'whisky',
					'Wiko' => 'wiko',
					'Wilkinson Sword Hydro 5' => 'wilkinson-sword-hydro-5',
					'Windows' => 'windows',
					'WindScribe' => 'windscribe',
					'Wolfenstein' => 'wolfenstein',
					'Wolfenstein II: The New Colossus' => 'wolfenstein-ii-the-new-colossus',
					'Xbox' => 'xbox',
					'Xbox Game Pass' => 'xbox-game-pass',
					'Xbox Live' => 'xbox-live',
					'XCOM' => 'xcom',
					'XCOM 2' => 'xcom-2',
					'Xiaomi' => 'xiaomi',
					'Xiaomi AirDots' => 'xiaomi-airdots',
					'Xiaomi Black Shark' => 'xiaomi-black-shark',
					'Xiaomi Black Shark 2' => 'xiaomi-black-shark-2',
					'Xiaomi Mi6' => 'xiaomi-mi6',
					'Xiaomi Mi8' => 'xiaomi-mi8',
					'Xiaomi Mi8 Lite' => 'xiaomi-mi8-lite',
					'Xiaomi Mi8 Pro' => 'xiaomi-mi8-pro',
					'Xiaomi Mi8 SE' => 'xoaimi-mi8-se',
					'Xiaomi Mi9' => 'xiaomi-mi9',
					'Xiaomi Mi 9 Lite' => 'xiaomi-mi-9-lite',
					'Xiaomi Mi 9 Pro' => 'xiaomi-mi-9-pro',
					'Xiaomi Mi 9 SE' => 'xiaomi-mi-9-se',
					'Xiaomi Mi 9T' => 'xiaomi-mi-9t',
					'Xiaomi Mi 9T Pro' => 'xiaomi-mi-9t-pro',
					'Xiaomi Mi 10' => 'xiaomi-mi-10',
					'Xiaomi Mi 10 Lite' => 'xiaomi-mi-10-lite',
					'Xiaomi Mi 10 Pro' => 'xiaomi-mi-10-pro',
					'Xiaomi Mi 10T' => 'xiaomi-mi-10t',
					'Xiaomi Mi 10T Lite' => 'xiaomi-mi-10t-lite',
					'Xiaomi Mi 10T Pro' => 'xiaomi-mi-10t-pro',
					'Xiaomi Mi 11' => 'xiaomi-mi-11',
					'Xiaomi Mi 11 Lite' => 'xiaomi-mi-11-lite',
					'Xiaomi Mi A1' => 'xiaomi-mi-a1',
					'Xiaomi Mi A2' => 'xiaomi-mi-a2',
					'Xiaomi Mi A2 Lite' => 'xiaomi-mi-a2-lite',
					'Xiaomi Mi Airdots Pro' => 'xiaomi-mi-airdots-pro',
					'Xiaomi Mi Band' => 'xiaomi-mi-band',
					'Xiaomi Mi Band 4' => 'xiaomi-mi-band-4',
					'Xiaomi Mi Band 5' => 'xiaomi-mi-band-5',
					'Xiaomi Mi Band 6' => 'xiaomi-mi-band-6',
					'Xiaomi Mi Box' => 'xiaomi-mi-box',
					'Xiaomi Mi Electric Scooter M365' => 'xiaomi-mi-electric-scooter-m365',
					'Xiaomi Mi Max' => 'xiaomi-mi-max',
					'Xiaomi Mi Mix' => 'xiaomi-mi-mix',
					'Xiaomi Mi Mix 2' => 'xiaomi-mi-mix-2',
					'Xiaomi Mi Note 10' => 'xiaomi-mi-note-10',
					'Xiaomi Mi Note 10 Pro' => 'xiaomi-mi-note-10-pro',
					'Xiaomi Mi Pad 3' => 'xiaomi-mi-pad-3',
					'Xiaomi Mi Watch' => 'xiaomi-mi-watch',
					'Xiaomi Pocophone F1' => 'xiaomi-pocophone-f1',
					'Xiaomi Redmi 4A' => 'xiaomi-redmi-4a',
					'Xiaomi Redmi 4X' => 'xiaomi-redmi-4x',
					'Xiaomi Redmi 7' => 'xiaomi-redmi-7',
					'Xiaomi Redmi 9' => 'xiaomi-redmi-9',
					'Xiaomi Redmi AirDots' => 'xiaomi-redmi-airdots',
					'Xiaomi Redmi Note 4' => 'xiaomi-redmi-note-4',
					'Xiaomi Redmi Note 5' => 'xiaomi-redmi-note-5',
					'Xiaomi Redmi Note 6' => 'xiaomi-redmi-note-6',
					'Xiaomi Redmi Note 7' => 'xiaomi-redmi-note-7',
					'Xiaomi Redmi Note 8' => 'xiaomi-redmi-note-8',
					'Xiaomi Redmi Note 8 Pro' => 'xiaomi-redmi-note-8-pro',
					'Xiaomi Redmi Note 9' => 'xiaomi-redmi-note-9',
					'Xiaomi Redmi Note 9 Pro' => 'xiaomi-redmi-note-9-pro',
					'Xiaomi Redmi Note 9S' => 'xiaomi-redmi-note-9s',
					'Xiaomi Redmi Note 10' => 'xiaomi-redmi-note-10',
					'Xiaomi Redmi Note 10 Pro' => 'xiaomi-redmi-10-pro',
					'Xiaomi Smart Home' => 'xiaomi-smart-home',
					'Yamaha' => 'yamaha',
					'Yeelight' => 'xiaomi-yeelight',
					'Yoshi&#039;s Crafted World' => 'yoshi-crafted-world',
					'Zoos' => 'zoos',
				)
			),
			'order' => array(
				'name' => 'Trier par',
				'type' => 'list',
				'title' => 'Ordre de tri des deals',
				'values' => array(
					'Du deal le plus Hot au moins Hot' => '-hot',
					'Du deal le plus récent au plus ancien' => '-nouveaux',
				)
			)
		),
		'Surveillance Discussion' => array(
			'url' => array(
				'name' => 'URL de la discussion',
				'type' => 'text',
				'required' => true,
				'title' => 'URL discussion à surveiller: https://www.dealabs.com/discussions/titre-1234',
				'exampleValue' => 'https://www.dealabs.com/discussions/titre-1234',
				),

			'only_with_url' => array(
				'name' => 'Exclure les commentaires sans URL',
				'type' => 'checkbox',
				'title' => 'Exclure les commentaires ne contenant pas d\'URL dans le flux',
				'defaultValue' => false,
				)


			)

	);

	public $lang = array(
		'bridge-uri' => SELF::URI,
		'bridge-name' => SELF::NAME,
		'context-keyword' => 'Recherche par Mot(s) clé(s)',
		'context-group' => 'Deals par groupe',
		'context-talk' => 'Surveillance Discussion',
		'uri-group' => 'groupe/',
		'request-error' => 'Impossible de joindre Dealabs',
		'thread-error' => 'Impossible de déterminer l\'ID de la discussion. Vérifiez l\'URL que vous avez entré',
		'no-results' => 'Il n&#039;y a rien à afficher pour le moment :(',
		'relative-date-indicator' => array(
			'il y a',
		),
		'price' => 'Prix',
		'shipping' => 'Livraison',
		'origin' => 'Origine',
		'discount' => 'Réduction',
		'title-keyword' => 'Recherche',
		'title-group' => 'Groupe',
		'title-talk' => 'Surveillance Discussion',
		'local-months' => array(
			'janvier',
			'février',
			'mars',
			'avril',
			'mai',
			'juin',
			'juillet',
			'août',
			'septembre',
			'octobre',
			'novembre',
			'décembre'
		),
		'local-time-relative' => array(
			'il y a ',
			'min',
			'h',
			'jour',
			'jours',
			'mois',
			'ans',
			'et '
		),
		'date-prefixes' => array(
			'Actualisé ',
		),
		'relative-date-alt-prefixes' => array(
			'Actualisé ',
		),
		'relative-date-ignore-suffix' => array(
		),

		'localdeal' => array(
			'Local',
			'Pays d\'expédition'
		),
	);



}

class PepperBridgeAbstract extends BridgeAbstract {

	const CACHE_TIMEOUT = 3600;

	public function collectData(){
		switch($this->queriedContext) {
		case $this->i8n('context-keyword'):
			return $this->collectDataKeywords();
			break;
		case $this->i8n('context-group'):
			return $this->collectDataGroup();
			break;
		case $this->i8n('context-talk'):
			return $this->collectDataTalk();
			break;
		}
	}

	/**
	 * Get the Deal data from the choosen group in the choosed order
	 */
	protected function collectDataGroup()
	{
		$url = $this->getGroupURI();
		$this->collectDeals($url);
	}

	/**
	 * Get the Deal data from the choosen keywords and parameters
	 */
	protected function collectDataKeywords()
	{
		/* Even if the original website uses POST with the search page, GET works too */
		$url = $this->getSearchURI();
		$this->collectDeals($url);
	}

	/**
	 * Get the Deal data using the given URL
	 */
	protected function collectDeals($url){
		$html = getSimpleHTMLDOM($url)
			or returnServerError($this->i8n('request-error'));
		$list = $html->find('article[id]');

		// Deal Image Link CSS Selector
		$selectorImageLink = implode(
			' ', /* Notice this is a space! */
			array(
				'cept-thread-image-link',
				'imgFrame',
				'imgFrame--noBorder',
				'thread-listImgCell',
			)
		);

		// Deal Link CSS Selector
		$selectorLink = implode(
			' ', /* Notice this is a space! */
			array(
				'cept-tt',
				'thread-link',
				'linkPlain',
			)
		);

		// Deal Hotness CSS Selector
		$selectorHot = implode(
			' ', /* Notice this is a space! */
			array(
				'cept-vote-box',
				'vote-box'
			)
		);

		// Deal Description CSS Selector
		$selectorDescription = implode(
			' ', /* Notice this is a space! */
			array(
				'cept-description-container',
				'overflow--wrap-break'
			)
		);

		// Deal Date CSS Selector
		$selectorDate = implode(
			' ', /* Notice this is a space! */
			array(
				'size--all-s',
				'flex',
				'boxAlign-jc--all-fe'
			)
		);

		// If there is no results, we don't parse the content because it display some random deals
		$noresult = $html->find('h3[class=size--all-l size--fromW2-xl size--fromW3-xxl]', 0);
		if ($noresult != null && strpos($noresult->plaintext, $this->i8n('no-results')) !== false) {
			$this->items = array();
		} else {
			foreach ($list as $deal) {
				$item = array();
				$item['uri'] = $this->getDealURI($deal);
				$item['title'] = $this->GetTitle($deal);
				$item['author'] = $deal->find('span.thread-username', 0)->plaintext;

				$item['content'] = '<table><tr><td><a href="'
					. $item['uri']
						. '"><img src="'
						. $this->getImage($deal)
						. '"/></td><td>'
						. $this->getHTMLTitle($item)
						. $this->getPrice($deal)
						. $this->getDiscount($deal)
						. $this->getShipsFrom($deal)
						. $this->getShippingCost($deal)
						. $this->GetSource($deal)
						. $deal->find('div[class*=' . $selectorDescription . ']', 0)->innertext
						. '</td><td>'
						. $deal->find('div[class*=' . $selectorHot . ']', 0)
						->find('span', 1)->outertext
						. '</td></table>';
				$dealDateDiv = $deal->find('div[class*=' . $selectorDate . ']', 0)
					->find('span[class=hide--toW3]');
				$itemDate = end($dealDateDiv)->plaintext;
				// In case of a Local deal, there is no date, but we can use
				// this case for other reason (like date not in the last field)
				if ($this->contains($itemDate, $this->i8n('localdeal'))) {
					$item['timestamp'] = time();
				} else if ($this->contains($itemDate, $this->i8n('relative-date-indicator'))) {
					$item['timestamp'] = $this->relativeDateToTimestamp($itemDate);
				} else {
					$item['timestamp'] = $this->parseDate($itemDate);
				}
				$this->items[] = $item;
			}
		}
	}

	/**
	 * Get the Talk lastest comments
	 */
	protected function collectDataTalk(){
		$threadURL = $this->getInput('url');
		$onlyWithUrl = $this->getInput('only_with_url');

		// Get Thread ID from url passed in parameter
		$threadSearch = preg_match('/-([0-9]{1,20})$/', $threadURL, $matches);

		// Show an error message if we can't find the thread ID in the URL sent by the user
		if($threadSearch !== 1) {
			returnClientError($this->i8n('thread-error'));
		}
		$threadID = $matches[1];

		$url = $this->i8n('bridge-uri') . 'graphql';

		// Get Cookies header to do the query
		$cookies = $this->getCookies($url);

		// Construct the GraphQL query string
		$graphqlArray = array(
			'query comments($filter:CommentFilter!,$limit:Int,$page:Int){comments(filter:$filter,limit:$li',
			'mit,page:$page){items{...commentFields}pagination{...paginationFields}}}fragment commentField',
			's on Comment{commentId threadId url preparedHtmlContent user{...userMediumAvatarFields...user',
			'NameFields...userPersonaFields bestBadge{...badgeFields}}reactionCounts{type count}deletable ',
			'currentUserReaction{type}reported reportable source status createdAt updatedAt ignored popula',
			'r deletedBy{username}notes{content createdAt user{username}}lastEdit{reason timeAgo userId}}f',
			'ragment userMediumAvatarFields on User{userId isDeletedOrPendingDeletion imageUrls(slot:"defa',
			'ult",variations:["user_small_avatar"])}fragment userNameFields on User{userId username isUser',
			'ProfileHidden isDeletedOrPendingDeletion}fragment userPersonaFields on User{persona{type text',
			'}}fragment badgeFields on Badge{badgeId level{...badgeLevelFields}}fragment badgeLevelFields ',
			'on BadgeLevel{key name description}fragment paginationFields on Pagination{count current last',
			' next previous size order}'
		);
		$graphqlString = implode('', $graphqlArray);

		// Construct the JSON object to send to the Website
		$queryArray = array (
			'query' => $graphqlString,
			'variables' => array (
				'filter' => array (
					'threadId' => array (
						'eq' => $threadID,
						),
					'order' => array (
						'direction' => 'Descending',
						),

					),
				'page' => 1,
				),
			);
		$queryJSON = json_encode($queryArray);

		// HTTP headers
		$header = array(
				'Content-Type: application/json',
				'Accept: application/json, text/plain, */*',
				'X-Pepper-Txn: threads.show',
				'X-Request-Type: application/vnd.pepper.v1+json',
				'X-Requested-With: XMLHttpRequest',
				$cookies,
			);
		// CURL Options
		$opts = array(
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $queryJSON
				);
		$json = getContents($url, $header, $opts);
		$objects = json_decode($json);
		foreach($objects->data->comments->items as $comment) {
			$item = array();
			$item['uri'] = $comment->url;
			$item['title'] = $comment->user->username . ' - ' . $comment->createdAt;
			$item['author'] = $comment->user->username;
			$item['content'] = $comment->preparedHtmlContent;
			$item['uid'] = $comment->commentId;
			// Timestamp handling needs a new parsing function
			if($onlyWithUrl == true) {
				// Count Links and Quote Links
				$content = str_get_html($item['content']);
				$countLinks = count($content->find('a[href]'));
				$countQuoteLinks = count($content->find('a[href][class=userHtml-quote-source]'));
				// Only add element if there are Links ans more links tant Quote links
				if($countLinks > 0 && $countLinks > $countQuoteLinks) {
					$this->items[] = $item;
				}
			} else {
				$this->items[] = $item;
			}
		}
	}

	/**
	 * Extract the cookies obtained from the URL
	 * @return array the array containing the cookies set by the URL
	 */
	private function getCookies($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// get headers too with this line
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$result = curl_exec($ch);
		// get cookie
		// multi-cookie variant contributed by @Combuster in comments
		preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
		$cookies = array();
		foreach($matches[1] as $item) {
			parse_str($item, $cookie);
			$cookies = array_merge($cookies, $cookie);
		}
		$header = 'Cookie: ';
		foreach($cookies as $name => $content) {
			$header .= $name . '=' . $content . '; ';
		}
		return $header;
	}

	/**
	 * Check if the string $str contains any of the string of the array $arr
	 * @return boolean true if the string matched anything otherwise false
	 */
	private function contains($str, array $arr)
	{
		foreach ($arr as $a) {
			if (stripos($str, $a) !== false) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Get the Price from a Deal if it exists
	 * @return string String of the deal price
	 */
	private function getPrice($deal)
	{
		if ($deal->find(
			'span[class*=thread-price]', 0) != null) {
			return '<div>' . $this->i8n('price') . ' : '
				. $deal->find(
					'span[class*=thread-price]', 0
				)->plaintext
				. '</div>';
		} else {
			return '';
		}
	}

	/**
	 * Get the Title from a Deal if it exists
	 * @return string String of the deal title
	 */
	private function getTitle($deal)
	{

		$titleRoot = $deal->find('div[class*=threadGrid-title]', 0);
		$titleA = $titleRoot->find('a[class*=thread-link]', 0);
		$titleFirstChild = $titleRoot->first_child();
		if($titleA !== null) {
			$title = $titleA->plaintext;
		} else {
		// Inb ssome case, expired deals have a different format
			$title = $titleRoot->find('span', 0)->plaintext;
		}

		return $title;

	}

	/**
	 * Get the Title from a Talk if it exists
	 * @return string String of the Talk title
	 */
	private function getTalkTitle()
	{
		$html = getSimpleHTMLDOMCached($this->getInput('url'));
		$title = $html->find('h1[class=thread-title]', 0)->plaintext;
		return $title;

	}

	/**
	 * Get the HTML Title code from an item
	 * @return string String of the deal title
	 */
	private function getHTMLTitle($item)
	{
		if($item['uri'] == '') {
			$html = '<h2>' . $item['title'] . '</h2>';
		} else {
			$html = '<h2><a href="' . $item['uri'] . '">'
				. $item['title'] . '</a></h2>';
		}

		return $html;

	}

	/**
	 * Get the URI from a Deal if it exists
	 * @return string String of the deal URI
	 */
	private function getDealURI($deal)
	{

		$uriA = $deal->find('div[class*=threadGrid-title]', 0)->find('a[class*=thread-link]', 0);
		if($uriA === null) {
			$uri = '';
		} else 	{
			$uri = $uriA->href;
		}

		return $uri;

	}

	/**
	 * Get the Shipping costs from a Deal if it exists
	 * @return string String of the deal shipping Cost
	 */
	private function getShippingCost($deal)
	{
		if ($deal->find('span[class*=cept-shipping-price]', 0) != null) {
			if ($deal->find('span[class*=cept-shipping-price]', 0)->children(0) != null) {
				return '<div>' . $this->i8n('shipping') . ' : '
					. $deal->find('span[class*=cept-shipping-price]', 0)->children(0)->innertext
					. '</div>';
			} else {
				return '<div>' . $this->i8n('shipping') . ' : '
					. $deal->find('span[class*=cept-shipping-price]', 0)->innertext
					. '</div>';
			}
		} else {
			return '';
		}
	}

	/**
	 * Get the source of a Deal if it exists
	 * @return string String of the deal source
	 */
	private function GetSource($deal)
	{
		if ($deal->find('a[class=text--color-greyShade]', 0) != null) {
			return '<div>' . $this->i8n('origin') . ' : '
				. $deal->find('a[class=text--color-greyShade]', 0)->outertext
				. '</div>';
		} else {
			return '';
		}
	}

	/**
	 * Get the original Price and discout from a Deal if it exists
	 * @return string String of the deal original price and discount
	 */
	private function getDiscount($deal)
	{
		if ($deal->find('span[class*=mute--text text--lineThrough]', 0) != null) {
			$discountHtml = $deal->find('span[class=space--ml-1 size--all-l size--fromW3-xl]', 0);
			if ($discountHtml != null) {
				$discount = $discountHtml->plaintext;
			} else {
				$discount = '';
			}
			return '<div>' . $this->i8n('discount') . ' : <span style="text-decoration: line-through;">'
				. $deal->find(
					'span[class*=mute--text text--lineThrough]', 0
				)->plaintext
				. '</span>&nbsp;'
				. $discount
				. '</div>';
		} else {
			return '';
		}
	}

	/**
	 * Get the Picture URL from a Deal if it exists
	 * @return string String of the deal Picture URL
	 */
	private function getImage($deal)
	{
		$selectorLazy = implode(
			' ', /* Notice this is a space! */
			array(
				'thread-image',
				'width--all-auto',
				'height--all-auto',
				'imgFrame-img',
				'cept-thread-img',
				'img--dummy',
				'js-lazy-img'
			)
		);

		$selectorPlain = implode(
			' ', /* Notice this is a space! */
			array(
				'thread-image',
				'width--all-auto',
				'height--all-auto',
				'imgFrame-img',
				'cept-thread-img'
			)
		);
		if ($deal->find('img[class=' . $selectorLazy . ']', 0) != null) {
			return json_decode(
				html_entity_decode(
					$deal->find('img[class=' . $selectorLazy . ']', 0)
					->getAttribute('data-lazy-img')))->{'src'};
		} else {
			return $deal->find('img[class*=' . $selectorPlain . ']', 0	)->src;
		}
	}

	/**
	 * Get the originating country from a Deal if it exists
	 * @return string String of the deal originating country
	 */
	private function getShipsFrom($deal)
	{
		$selector = implode(
			' ', /* Notice this is a space! */
			array(
				'meta-ribbon',
				'overflow--wrap-off',
				'space--l-3',
				'text--color-greyShade'
			)
		);
		if ($deal->find('span[class=' . $selector . ']', 0) != null) {
			return '<div>'
				. $deal->find('span[class=' . $selector . ']', 0)->children(2)->plaintext
				. '</div>';
		} else {
			return '';
		}
	}

	/**
	 * Transforms a local date into a timestamp
	 * @return int timestamp of the input date
	 */
	private function parseDate($string)
	{
		$month_local = $this->i8n('local-months');
		$month_en = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December'
		);

		// A date can be prfixed with some words, we remove theme
		$string = $this->removeDatePrefixes($string);
		// We translate the local months name in the english one
		$date_str = trim(str_replace($month_local, $month_en, $string));

		// If the date does not contain any year, we add the current year
		if (!preg_match('/[0-9]{4}/', $string)) {
			$date_str .= ' ' . date('Y');
		}

		// Add the Hour and minutes
		$date_str .= ' 00:00';
		$date = DateTime::createFromFormat('j F Y H:i', $date_str);
		// In some case, the date is not recognized : as a workaround the actual date is taken
		if($date === false) {
			$date = new DateTime();
		}
		return $date->getTimestamp();
	}

	/**
	 * Remove the prefix of a date if it has one
	 * @return the date without prefiux
	 */
	private function removeDatePrefixes($string)
	{
		$string = str_replace($this->i8n('date-prefixes'), array(), $string);
		return $string;
	}

	/**
	 * Remove the suffix of a relative date if it has one
	 * @return the relative date without suffixes
	 */
	private function removeRelativeDateSuffixes($string)
	{
		if (count($this->i8n('relative-date-ignore-suffix')) > 0) {
			$string = preg_replace($this->i8n('relative-date-ignore-suffix'), '', $string);
		}
		return $string;
	}

	/**
	 * Transforms a relative local date into a timestamp
	 * @return int timestamp of the input date
	 */
	private function relativeDateToTimestamp($str) {
		$date = new DateTime();

		// In case of update date, replace it by the regular relative date first word
		$str = str_replace($this->i8n('relative-date-alt-prefixes'), $this->i8n('local-time-relative')[0], $str);

		$str = $this->removeRelativeDateSuffixes($str);

		$search = $this->i8n('local-time-relative');

		$replace = array(
			'-',
			'minute',
			'hour',
			'day',
			'month',
			'year',
			''
		);

		$date->modify(str_replace($search, $replace, $str));
		return $date->getTimestamp();
	}

	/**
	 * Returns the RSS Feed title according to the parameters
	 * @return string the RSS feed Tiyle
	 */
	public function getName(){
		switch($this->queriedContext) {
			case $this->i8n('context-keyword'):
				return $this->i8n('bridge-name') . ' - ' . $this->i8n('title-keyword') . ' : ' . $this->getInput('q');
				break;
			case $this->i8n('context-group'):
				$values = $this->getParameters()[$this->i8n('context-group')]['group']['values'];
				$group = array_search($this->getInput('group'), $values);
				return $this->i8n('bridge-name') . ' - ' . $this->i8n('title-group') . ' : ' . $group;
				break;
			case $this->i8n('context-talk'):
				return $this->i8n('bridge-name') . ' - ' . $this->i8n('title-talk') . ' : ' . $this->getTalkTitle();
				break;
			default: // Return default value
				return static::NAME;
		}
	}

	/**
	 * Returns the RSS Feed URI according to the parameters
	 * @return string the RSS feed Title
	 */
	public function getURI(){
		switch($this->queriedContext) {
			case $this->i8n('context-keyword'):
				return $this->getSearchURI();
				break;
			case $this->i8n('context-group'):
				return $this->getGroupURI();
				break;
			case $this->i8n('context-talk'):
				return $this->getTalkURI();
				break;
			default: // Return default value
				return static::URI;
		}
	}

	/**
	 * Returns the RSS Feed URI for a keyword Feed
	 * @return string the RSS feed URI
	 */
	private function getSearchURI(){
		$q = $this->getInput('q');
		$hide_expired = $this->getInput('hide_expired');
		$hide_local = $this->getInput('hide_local');
		$priceFrom = $this->getInput('priceFrom');
		$priceTo = $this->getInput('priceTo');
		$url = $this->i8n('bridge-uri')
			. 'search/advanced?q='
			. urlencode($q)
			. '&hide_expired=' . $hide_expired
			. '&hide_local=' . $hide_local
			. '&priceFrom=' . $priceFrom
			. '&priceTo=' . $priceTo
			/* Some default parameters
			 * search_fields : Search in Titres & Descriptions & Codes
			 * sort_by : Sort the search by new deals
			 * time_frame : Search will not be on a limited timeframe
			 */
			. '&search_fields[]=1&search_fields[]=2&search_fields[]=3&sort_by=new&time_frame=0';
		return $url;
	}

	/**
	 * Returns the RSS Feed URI for a group Feed
	 * @return string the RSS feed URI
	 */
	private function getGroupURI(){
		$group = $this->getInput('group');
		$order = $this->getInput('order');

		$url = $this->i8n('bridge-uri')
			. $this->i8n('uri-group') . $group . $order;
		return $url;
	}

	/**
	 * Returns the RSS Feed URI for a Talk Feed
	 * @return string the RSS feed URI
	 */
	private function getTalkURI(){
		$url = $this->getInput('url');
		return $url;
	}

	/**
	 * This is some "localisation" function that returns the needed content using
	 * the "$lang" class variable in the local class
	 * @return various the local content needed
	 */
	protected function i8n($key)
	{
		if (array_key_exists($key, $this->lang)) {
			return $this->lang[$key];
		} else {
			return null;
		}
	}
}
