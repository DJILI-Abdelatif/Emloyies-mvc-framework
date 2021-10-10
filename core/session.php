<?php

    namespace core;

    class Session
    {

        // protected const FLASH_KEY = 'flash_messages';

        public function __construct()
        {
            session_start();
            // $flashmessages = $_SESSION[self::FLASH_KEY] ?? [];
            // foreach($flashmessages as $key => &$flashmessage) {
            //     // make to be removed
            //     $flashmessage['remove'] = true;
            // }
            // $_SESSION[self::FLASH_KEY] = $flashmessages;
        }
        
        // public function setFlash($key, $message) {
        //     $_SESSION[self::FLASH_KEY][$key] = [
        //         'remove' => false,
        //         'value' => $message
        //     ];
        // }
        
        // public function getFlash($key) {
        //     return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
        // }

        // public function __destruct()
        // {
        //     // iterate over marked to be removed
        //     $flashmessages = $_SESSION[self::FLASH_KEY] ?? [];
        //     foreach($flashmessages as $key => &$flashmessage) {
        //         if($flashmessage['remove'] === 1) {
        //             unset($flashmessage[$key]);
        //         }
        //     }
        //     $_SESSION[self::FLASH_KEY] = $flashmessages;
        // }

        public function set(string $key, $value) {
            $_SESSION[$key] = $value;
        }

        public function get($key) {
            return $_SESSION[$key];
        }

        public function remove($key) {
            unset($_SESSION[$key]);
        }

        public function flashSession(string $stype, string $message) {
            setcookie($stype, $message, time() + 4, '/');
        }
        
    }


?>