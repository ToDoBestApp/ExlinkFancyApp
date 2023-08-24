# FancyExlinkApp - Testovacia uloha

# Popis architektury aplikacie

Apka funguje na baze monolithu kde hlavny skelet vdaka Laravelu tvori MVC architektura. Pre lepsiu abstrakciu kodu som pridal Service/Repository navrhovy vzor a zaroven Provider (Providers/RepositoryServiceProvider) v ktorom som bindoval PostRepositoryInterface s PostService. Tento interface bol nasledne injectovany do PostService pomocou construction DI.

Pri programovani som pouzil SOLID principy.

Auth management je tvoreny pomocou stateful authentifikacie. Aby som zabezpecil ze server nebude ukladat do suboru session zvolil som session driver = cookie a session encryptoval.

Pre lepsiu prehladnost som pre kazdy controller v routes vytvoril zvlast subor a do routes/web som vlozil funckiu ktora ich vola.

Okrem toho ze som pouzil prislusny middleware podla metod ktore si aplikacia vyzaduje som vytvoril aj novy "PreventBackButton" middleware pre Cache-Control ktory zabezpeci ze po odhlaseni sa nebude mozne browserom dostat spat do danych ciest.

Uzivatelske akcie a jednotlive metody su osetrene pomocou Policies.

Pre kazdy opodstatneny request som vytvoril zvlast FormRequest.

Pri DI som pouzil construction promotion (vlastnost php 8.x).

V RDBMS je cez migraciu pridana nova tabulka (users_posts) ktora obsahuje okrem zakladnych datovych typov a primaryKey aj foreignKey (integrita) a index (zrychlenie query).

Vulnerabilita SQL injection je vdaka ORM resp. PDO osetrena.

Eloquent obsahuje jednu one-to-many relation (user - posts).

Okrem modelu som pridal aj seeder pomocou factory.

Pri zobrazovani vsetkych postov som pouzil pagination.

BE a FE nie je v tomto pripade decouplovany a ako CSS framework som pouzil Tailwind.

Pre lepsiu znovupouzitelnost elementov je Blade tvoreny pomocou componentov.

Samozrejme pokial by sme chceli BE a FE decouplovat mozeme na FE pouzit napr. Nuxt.js alebo Next.js a z BE by sa vracali REST API a stateless auth napr. Passport alebo JWT.

Pre jednotnost enviromentu som celu appku kontainerizoval pomocou Dockeru.

# Doplnujuce informacie

V realnom pripade by som riesil design pomocou vhodnych sablon alebo design manualu. V tom pripade som sa snazil dokazat ze viem napisat velmi kvalitny a cisty kod za velmi kratky cas (prakticky behom par hodin). Takyto styl vyvoja moze byt konecnom dosledku pri realnych zakazkach resp. dodatocnych features krucialny vzhladom na rozpocet a termin releasu.

# Spustenie aplikacie

Po stiahnuti (naklonovani) z GitHubu spustit pomocou nasledujucich prikazov

- ./vendor/bin/sail build
- ./vendor/bin/sail up
- ./vendor/bin/sail shell
    - php artisan migrate --seed
    - npm run dev

Pokial nemate nainstalovany Docker prosim nainstalovat vsetky uvedene technologie podla hore uvedeneho zoznamu.

App bude pristupna na http://localhost.
