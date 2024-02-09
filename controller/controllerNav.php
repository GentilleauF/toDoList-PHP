<?php

class ControllerNav{
    public function logout() {
        session_destroy();
        header("Location: ./accueil");
        
    }
}