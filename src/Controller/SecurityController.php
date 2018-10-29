<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setRoles(['ROLE_USER']);
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function connextion()
    {
        return $this->render('security/connexion.html.twig', [
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function deconnexion() {}

    /**
     * @Route("profile", name="sectrity_profile  ")
     */
    public function admin()
    {
        return $this->render('security/profile.html.twig', [

        ]);
    }
}
