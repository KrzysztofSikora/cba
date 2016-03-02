<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 14:36
 */

//dołączamy plik autoload.php, aby zaimportować wszystkie pliki SDK
require_once 'autoload.php';

//deklarujemy użycie niezbędnych przestrzeni nazw (zawartych w plikach Facebook PHP SDK)
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

//defiujemy stałe z danymi naszej aplikacji
define ('FACEBOOK_APP_ID', '1776971415858954');
define ('FACEBOOK_APP_SECRET', 'f2ee09a3d2c5ca103560eb4b2173f1b9');
define ('FACEBOOK_REDIRECT_URL', 'http://example.com/page.html');

//wskazujemy, że dla bieżącej sesji będziemy używać aplikacji o następujących danych
FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
//tworzymy obiekt klasy FacebookRedirectLoginHelper - posłuży do wygenerowania linku logowania
$oRedirectLoginHelper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URL);

if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
    //jeśli mamy token to próbujemy odtworzyć sesję logowania
    $oSession = new FacebookSession($_SESSION['fb_token']);
    try {
        //jeśli sesja nie jest już ważna
        if (!$oSession->validate()) {
            //czyścimy obiekt sesji
            $oSession = null;
        }
    }
    catch(Exception $e) {
        //czyścimy obiekt sesji w przypadku problemów
        $oSession = null;
    }
}
elseif (empty($oSession)) {
    //obiekt sesji jest pusty
    try {
        //pobieramy obiekt sesji logowania
        $oSession = $oRedirectLoginHelper->getSessionFromRedirect();
    }
    catch(FacebookRequestException $ex) {
        //wyświetlamy błąd zwrócony przez API, jeśli wystąpił
        echo $ex->getMessage();
    }
    catch(\Exception $ex) {
        //wyświetlamy pozostałe błędy
        echo $ex->getMessage();
    }
}

//sprawdzamy, czy sesja logowania jest aktywna
if ($oSession) {
    //pobieramy AccessToken sesji - przyda się później
    $oAccessToken = $oSession->getToken();
    //możemy zapisać go w bieżącej sesji
    $_SESSION['fb_token'] = $oAccessToken;

    //tworzymy obiekt zapytania do Facebooka - pytamy o "/me", czyli dane zalogowanego użytkownika
    $oRequest = new FacebookRequest($oSession, 'GET', '/me');
    //wykonujemy zapytanie i przypisujemy do zmiennej; $oResponse zawiera odpowiedź od Facebooka
    $oResponse = $oRequest->execute();
    //wyciągamy z obiektu odpowiedzi GraphObject i zamieniamy do na tablicę asocjacyjną
    $aGraphArray = $oResponse->getGraphObject()->asArray();

    //w tym momencie $aGraphArray zawiera tablicę z danymi użytkownika
    //tutaj możemy wykonać dalsze czynności logowania lub rejestracji
}
//niezależnie od istnienia sesji pobieramy link logowania
//jako parametr przekazujemy tablicę wymaganych uprawnień
//w przykładzie moja aplikacja wymaga tylko dostępu do adresu email
//lista uprawnień: https://developers.facebook.com/docs/facebook-login/permissions/v2.2?locale=pl_PL
$sLoginUrl = $oRedirectLoginHelper->getLoginUrl(array('email'));