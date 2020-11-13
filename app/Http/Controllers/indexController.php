<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class indexController extends Controller
{

    public function sendFileWasabiStorage() {
        // je met mon fichier dans une variable
        $document = file_get_contents('C:\Users\tarbo\Documents\Diginamic\Méthode Agile\Scrum-Guide-FR.pdf'); 
        $documentName = 'Scrum-Guide-FR.pdf';
        // Je met dans mon storage wasabi mon fichier
         Storage::disk('wasabi')->put('PDF\Scrum-Guide-FR.pdf', $document);

        //Je vérifie si mon fichier déposé existe bien dans le storage wasabi
        $exists = Storage::disk('wasabi')->exists('PDF\Scrum-Guide-FR.pdf'); 

        // Pour vérifier si cela existe je crée une condition qui me dit si il est présent ou non
        if ($exists == true) {
        echo 'le ' . $documentName . ' est bien dans mon wasabi storage';
        } 
        else {
          echo 'le ' . $documentName .  'n est pas enregistré dans wasabi storage';
      } 
    }


    public function downloadUrlFile() {
       
    // ouvre la page avec le contenu
    $url= Storage::disk('wasabi')->temporaryUrl('PDF/Scrum-Guide-FR.pdf', now()->addMinutes(2));

       return $url;
    }

    public function downloadFile() {

    // Je selectionne et telecharge le fichier dans mon storage wasabi qui s'apelle 'test-wasabi.txt'
    $file = Storage::disk('wasabi')->download('PDF\Scrum-Guide-FR.pdf');

    // je le telecharge
    return $file;
    }


  
    
}
