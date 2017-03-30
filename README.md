# Tool Repository

#### Create New Tool

1) Create command file in `src/SpacedGAP/ToolRepo/Command` directory
    reference: https://symfony.com/doc/2.8/console.html
1) Add new command to service. Update `config/services.yml`.
    1) Add newly created command to services
    ```
    services:
        ...
        ...
        command.ib.pgcmin:
            class: SpacedGAP\ToolRepo\Command\IB\PgcMinCommand
    ```
    1) Add `add` method in `app.console.toolrepo` `calls` to automatically add command when instantiated by service container.
    ```
    services:
        app.console.toolrepo:
            ...
            calls:
                - [add, ['@command.ib.pgcmin']]
    ```
    Reference(s):
    * https://symfony.com/doc/2.8/service_container.html
    
#### Dev
Accessing `toolrepo` command on dev:

Displays help for a command
```
> bin/toolrepo help
```
Lists commands
```
> bin/toolrepo list
```
Run created command
```
> bin/toolrepo <command>
```

#### Build/Rebuild Phar
```
cd <checkout directory>
bin/build_phar.sh

```

or

```
cd <checkout directory>
composer install --no-dev
bin/box build -vvv
sha1sum build/toolrepo.phar > build/toolrepo.phar.version
```

From there, you may place it anywhere that will make it easier for you to access (such as /usr/local/bin) and chmod it to 755. You can even rename it to just `toolrepo` to avoid having to type the .phar extension every time.

*Notes:* output phar file `toolrepo.phar` is located in `build` directory


#### Updated Phar Build tool 
```
> bin/box update
```

reference(s): https://github.com/box-project/box2

#### Download Links
* http://gpetrache-at-ca.github.io/toolrepo/build/toolrepo.phar
* http://gpetrache-at-ca.github.io/toolrepo/build/toolrepo.phar.version
* http://gpetrache-at-ca.github.io/toolrepo/build/toolrepo.phar.pubkey

#### TODO List
- [ ] Create `self-update` command
