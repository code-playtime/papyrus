<?php

    return [
        "commands" => [
            //
        ],
        "providers" => [
            Papyrus\Providers\NovaProvider::class,
            Papyrus\Providers\FrameworkProvider::class,
            Papyrus\Providers\SecurityProvider::class,
            Papyrus\Providers\MailerProvider::class,
            Papyrus\Providers\PdoProvider::class
        ]
    ];
