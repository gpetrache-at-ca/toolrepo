# Illuminate Education Tools

#### Create New Tool

1) Create command file in `src/IlluminateEd/IEdTools/Command` directory
1) Add new command to service. Update `config/services.yml`.
    1) Add newly created command to services
    ```
    services:
        ...
        ...
        command.ib.pgcmin:
            class: IlluminateEd\IEdTools\Command\IB\PgcMinCommand
    ```
    2) Add `add` method in `iedtools.app` `calls` to automatically add command when instantiated by service container.
    ```
    services:
        iedtools.app:
            ...
            calls:
                - [add, ['@command.ib.pgcmin']]
    ```
    Reference(s):
    * https://symfony.com/doc/2.8/service_container.html
    

#### Build/Rebuild Phar
```
cd <checkout directory>
composer install --no-dev
bin/box build -vv
sha1sum build/iedtools.phar > build/iedtools.phar.version
```

From there, you may place it anywhere that will make it easier for you to access (such as /usr/local/bin) and chmod it to 755. You can even rename it to just `iedtools` to avoid having to type the .phar extension every time.

*Notes:* output phar file `iedtools.phar` is located in `build` directory

#### Dev
Accessing `iedtools` command on dev:

Displays help for a command
```
> bin/iedtools help
```
Lists commands
```
> bin/iedtools list
```
Run created command
```
> bin/iedtools <command>
```

#### Updated Phar Build tool 
```
> bin/box update
```

reference(s): https://github.com/box-project/box2

#### TODO List
- [ ] Create `self-update` command
