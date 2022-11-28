<?php

namespace App\Controller;

use App\Entity\Diplome;
use App\Entity\Entreprise;
use App\Entity\Tuteur;
use App\Entity\Utilisateur;
use App\Repository\DiplomeRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\TuteurRepository;
use App\Repository\UtilisateurRepository;
use Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 *  @Route("/api", name="Api")
 */

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/diplome/liste", name="DiplomesListe", methods={"GET"})
     */
    public function getDiplomeList(DiplomeRepository $diplomeRepository)
    {
        return $this->json(['data' => $diplomeRepository->findByIssup(0)]);
    }
    /**
     * @Route("/admin/diplome/new", name="NewDiplome", methods={"POST"})
     */
    public function SaveDiplome(Request $request, DiplomeRepository $diplomeRepository)
    {
        $donnes = json_decode($request->getContent());
        $d = new Diplome();
        $d->setDiplome($donnes->data->diplome);
        $d->setIssup(0);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($d);
        $sauv->flush();
        return $this->json(['data' => $diplomeRepository->findByIssup(0)]);
    }
    /**
     * @Route("/admin/diplome/update/{iddiplome}", name="UpdateDiplome", methods={"PUT"})
     */
    public function ModifyDiplome(Request $request, Diplome $d, DiplomeRepository $diplomeRepository)
    {
        $donnes = json_decode($request->getContent());
        $d->setDiplome($donnes->data->diplome);
        $d->setIssup(0);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($d);
        $sauv->flush();
        return $this->json(['data' => $diplomeRepository->findByIssup(0)]);
    }
    /**
     * @Route("/admin/diplome/delete/{iddiplome}", name="DiplomeDelete", methods={"DELETE"})
     */
    public function DeleteDiplome(Request $request, DiplomeRepository $diplomeRepository, Diplome $d)
    {
        $sauv = $this->getDoctrine()->getManager();
        try {
            $sauv->remove($d);
            $sauv->flush();
        } catch (Error $e) {
            $d->setIssup(1);
            $sauv->persist($d);
            $sauv->flush();
        }
        return $this->json(['data' => $diplomeRepository->findByIssup(0)]);
    }

    /**
     * @Route("/admin/administrateur/liste", name="AdminListe", methods={"GET"})
     */
    public function getAdministrateurListe(UtilisateurRepository $u)
    {
        return $this->json(['data' => $u->FindByTypeAndIssup("Administrateur", 0)], 200, [], ["groups" => "post:read"]);
    }
    /**
     * @Route("/admin/administrateur/new", name="NewAdministrateur", methods={"POST"})
     */
    public function SaveAdmin(Request $request, UtilisateurRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $admin = new Utilisateur();
        $admin->setType("Administrateur");
        $admin->setUsername($donnes->data->username);
        $admin->setIssup(0);
        $admin->setIsonline(0);
        $admin->setIsetudiant(0);
        $password = $encoder->encodePassword($admin, $donnes->data->password);
        $admin->setPassword($password);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($admin);
        $sauv->flush();
        return $this->json(['data' => $u->FindByTypeAndIssup("Administrateur", 0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/administrateur/update/{idutilisateur}", name="AdministrateurUpdate", methods={"PUT"})
     */
    public function ModifyAdministrateur(Request $request, Utilisateur $admin, UtilisateurRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $admin->setType("Administrateur");
        $admin->setUsername($donnes->data->username);
        $admin->setIssup(0);
        $admin->setIsonline(0);
        $admin->setIsetudiant(0);
        if ($donnes->data->password) {
            $password = $encoder->encodePassword($admin, $donnes->data->password);
            $admin->setPassword($password);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($admin);
        $sauv->flush();
        return $this->json(['data' => $u->FindByTypeAndIssup("Administrateur", 0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/administrateur/delete/{idutilisateur}", name="DeleteAdmin", methods={"DELETE"})
     */
    public function AdministrateurDelete(Request $request, UtilisateurRepository $u, Utilisateur $utilisateur)
    {
        $sauv = $this->getDoctrine()->getManager();
        try {
            $sauv->remove($utilisateur);
            $sauv->flush();
        } catch (Error $e) {
            $utilisateur->setIssup(1);
            $sauv->persist($utilisateur);
            $sauv->flush();
        }
        return $this->json(['data' => $u->FindByTypeAndIssup("Administrateur", 0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/utilisateur/liste", name="UtilisateurListe", methods={"GET"})
     */
    public function GetUtilisateurListe(UtilisateurRepository $u)
    {
        return $this->json(['data' => $u->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/utilisateur/new", name="AddUtilisateur", methods={"POST"})
     */
    public function NewUtilisateur(Request $request, UtilisateurRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $utilisateur = new Utilisateur();
        $utilisateur->setUsername($donnes->data->username);
        $utilisateur->setType($donnes->data->type);
        $utilisateur->setIssup(0);
        $utilisateur->setIsonline(0);
        $utilisateur->setIsetudiant(0);
        if ($donnes->data->password) {
            $password = $encoder->encodePassword($utilisateur, $donnes->data->password);
            $utilisateur->setPassword($password);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($utilisateur);
        $sauv->flush();
        return $this->json(['data' => $u->findOneByIdutilisateur($u->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/utilisateur/update/{idutilisateur}", name="UpdateUtilisateur", methods={"PUT"})
     */
    public function ModifyUtilisateur(Request $request, Utilisateur $utilisateur, UtilisateurRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $utilisateur->setUsername($donnes->data->username);
        $utilisateur->setType($donnes->data->type);
        $utilisateur->setIssup(0);
        $utilisateur->setIsonline(0);
        $utilisateur->setIsetudiant(0);
        if($donnes->data->password){
            $password = $encoder->encodePassword($utilisateur, $donnes->data->password);
            $utilisateur->setPassword($password);    
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($utilisateur);
        $sauv->flush();
        return $this->json(['data' => $u->findByIdutilisateur($u->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/utilisateur/delete/{idutilisateur}", name="UtilisateurDelete", methods={"DELETE"})
     */
    public function DeleteUtilisateur(Utilisateur $utilisateur,  UtilisateurRepository $u)
    {
        $sauv = $this->getDoctrine()->getManager();
        try {
            $sauv->remove($utilisateur);
            $sauv->flush();
        } catch (\Throwable $th) {
            $utilisateur->setIssup(1);
            $sauv->persist($utilisateur);
            $sauv->flush();
        }
        return $this->json(['data' => $u->findByIdutilisateur($u->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/entreprise/liste", name="ListeEntreprise", methods={"GET"})
     */
    public function GetEntrepriseListe(EntrepriseRepository $e)
    {
        return $this->json(['data' => $e->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/entreprise/new/{idutilisateur}", name="CreateEntreprise", methods={"POST"})
     */
    public function NewEntreprise(Request $request, Utilisateur $utilisateur, EntrepriseRepository $e)
    {
        $donnes = json_decode($request->getContent());
        $entreprise = new Entreprise();
        $entreprise->setIdutilisateur($utilisateur);
        $entreprise->setNom($donnes->data->nom);
        $entreprise->setLogo(null);
        $entreprise->setIssup(0);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($entreprise);
        $sauv->flush();
        return $this->json(['data' => $e->findOneByIdentreprise($e->getlast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/entreprise/update/{identreprise}", name="UpdateEntreprise", methods={"PUT"})
     */
    public function ModifyEntreprise(Request $request, Entreprise $entreprise,  EntrepriseRepository $e){
        $donnes = json_decode($request->getContent());
        $entreprise->setNom($donnes->data->nom);
        $entreprise->setIssup(0);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($entreprise);
        $sauv->flush();
        return $this->json(['data' => $e->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }
   
    /**
     * @Route("/admin/entreprise/delete/{identreprise}", name="EntrepriseDelete",methods={"DELETE"})
     */
    public function DeleteEntreprise(Entreprise $entreprise,  EntrepriseRepository $e){
        $sauv = $this->getDoctrine()->getManager();
        $utilisateur = $entreprise->getIdutilisateur();
        $directory = $this->getParameter('file_directory');
        $directory = $directory . '/Entreprise/'. $entreprise->getNom();
        if($entreprise->getLogo()){
            unlink($directory . '/' . $entreprise->getLogo());
        }
        try {
            $sauv->remove($entreprise);
            $sauv->flush();
        } catch (\Throwable $th) {
            $entreprise->setIssup(1);
            $sauv->persist($entreprise);
            $sauv->flush();
        }
        try {
            $sauv->remove($utilisateur);
            $sauv->flush();
        } catch (\Throwable $th) {
            $utilisateur->setIssup(1);
            $sauv->persist($utilisateur);
            $sauv->flush();
        }
        return $this->json(['data' => $e->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/entreprise/logo/{identreprise}", name="SaveLogoEntreprise", methods={"POST"})
     */
    public function LogoEntreprise(Request $request, Entreprise $entreprise,  EntrepriseRepository $e){
        $file = $request->files->get('file');
        $files = md5(uniqid()) . '.' . $file->guessExtension();
        $extension = $file->guessExtension();
        $directory = $this->getParameter('file_directory');
        $directory = $directory . '/Entreprise/'. $entreprise->getNom();
        if($entreprise->getLogo()) {
            unlink($directory . '/' . $entreprise->getLogo());
        }
        $file->move($directory, $files);
        $entreprise->setLogo($files);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($entreprise);
        $sauv->flush();
        return $this->json(['data' => $e->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/tuteur/liste", name="TuteurListe", methods={"GET"})
     */
    public function GetListeTuteur(TuteurRepository $t){
        return $this->json(['data' => $t->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/tuteur/new/{idutilisateur}", name="CreateTuteur", methods={"POST"})
     */
    public function NewTuteur(Request $request, TuteurRepository $t, Utilisateur $utilisateur, EntrepriseRepository $e){
        $donnes = json_decode($request->getContent());
        $tuteur = new Tuteur();
        $tuteur->setContact($donnes->data->contact);
        $tuteur->setAdresse($donnes->data->adresse);
        $tuteur->setEntreprise($donnes->data->entreprise);
        if($donnes->data->identreprise){
            $entreprise = $e->findOneByIdentreprise($donnes->data->identreprise->identreprise);
            $tuteur->setIdentreprise($entreprise);
        }
        $tuteur->setIdutilisateur($utilisateur);
        $tuteur->setPhoto(null);
        $tuteur->setEmail($donnes->data->email);
        $tuteur->setPrenom($donnes->data->prenom);
        $tuteur->setNom($donnes->data->nom);
        $tuteur->setIssup(0);
        $tuteur->setPoste($donnes->data->poste);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($tuteur);
        $sauv->flush();
        return $this->json(['data' => $t->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/tuteur/update/{idtuteur}", name="TuteurUpdate", methods={"PUT"})
     */
    public function UpdateTuteur(Request $request, Tuteur $tuteur,TuteurRepository $t, EntrepriseRepository $e){
        $donnes = json_decode($request->getContent());
        $tuteur->setContact($donnes->data->contact);
        $tuteur->setPrenom($donnes->data->prenom);
        $tuteur->setNom($donnes->data->nom);
        $tuteur->setAdresse($donnes->data->adresse);
        $tuteur->setEntreprise($donnes->data->entreprise);
        if($donnes->data->identreprise){
            $entreprise = $e->findOneByIdentreprise($donnes->data->identreprise->identreprise);
            $tuteur->setIdentreprise($entreprise);
        }
        $tuteur->setIssup(0);
        $tuteur->setEmail($donnes->data->email);
        $tuteur->setPoste($donnes->data->poste);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($tuteur);
        $sauv->flush();
        return $this->json(['data' => $t->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/admin/tuteur/delete/{idtuteur}", name="TuteurDelete", methods={"DELETE"})
     */
    public function DeleteTuteur(Tuteur $tuteur, TuteurRepository $t){
        $sauv = $this->getDoctrine()->getManager();
         $directory = $this->getParameter('file_directory');
        $directory = $directory . '/Entreprise/'. $tuteur->getNom();
        if($tuteur->getPhoto()){
            unlink($directory . '/' . $tuteur->getPhoto());
        }
        try {
            $sauv->remove($tuteur);
            $sauv->flush();
        } catch (\Throwable $th) {
            $tuteur->setIssup(1);
            $sauv->persist($tuteur);
            $sauv->flush();
        }
        return $this->json(['data' => $t->findByIssup(0)], 200, [], ["groups" => "post:read"]);
    }
}
