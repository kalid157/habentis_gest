<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function show($session)
    {
       // Logique pour récupérer les données spécifiques de la session
        $data = $this->getSessionData($session);

       // Si la session n'est pas trouvé rediriger vers une page d'erreur
        if(empty($data)) {
           return abort(404);
         }

        return view('sessions.show', ['session' => $session,'data' => $data]);
    }

    private function getSessionData( $session ) {
        // Utilise une base de données pour récupérer les données de la session
        // Sinon on utilise une liste simple pour l'exemple
         $sessionsData = [
           'fevrier-2024' => [
               'name' => 'Fevrier 2024',
               'participants' => 12,
              'revenu' => '200000'
           ],
           'juin-2024' => [
              'name' => 'Juin 2024',
               'participants' => 23,
              'revenu' => '400000'
            ]
        ];

         if( array_key_exists( $session, $sessionsData )) {
           return $sessionsData[ $session ];
        }

         return null;
    }
}
