<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class indexController extends Controller
{

    public function sendFileWasabiStorage() {
        // je met mon fichier dans une variable
        $document = file_get_contents('C:\Users\tarbo\Documents\test-wasabi.txt'); 

        // Je met dans mon storage wasabi mon fichier
         Storage::disk('wasabi')->put('test-wasabi.txt', $document);

        //Je vérifie si mon fichier déposé existe bien dans le storage wasabi
        $exists = Storage::disk('wasabi')->exists('test-wasabi.txt'); 

        // Pour vérifier si cela existe je crée une condition qui me dit si il est présent ou non
        if ($exists == true) {
        echo 'le fichier est bien dans mon wasabi storage';
        } 
        else {
          echo 'le fichier n est pas enregistré dans wasabi storage';
      } 
    }


    public function downloadUrlFile() {
       
    $file = Storage::disk('wasabi')->download('test-wasabi.txt');
    // ouvre la page avec le contenu
    $url= Storage::disk('wasabi')->temporaryUrl($file, now()->addMinutes(2));

       return $url;
    }

    public function downloadFile() {

    // Je selectionne et telecharge le fichier dans mon storage wasabi qui s'apelle 'test-wasabi.txt'
    $file = Storage::disk('wasabi')->download('test-wasabi.txt');

    // je le telecharge
    return $file;
    }


  
    
}
