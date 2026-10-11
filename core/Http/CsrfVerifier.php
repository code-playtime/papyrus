<?php

    namespace Papyrus\Http;

    use Pecee\Http\Middleware\BaseCsrfVerifier;
    use Papyrus\Http\SessionTokenProvider;

    class CsrfVerifier extends BaseCsrfVerifier {
        protected array $except = ["/api/*"];

        public function __construct() {
            $this->setTokenProvider(new SessionTokenProvider());
        }

        public function validateToken(string $token) {
            //
        }
    }
