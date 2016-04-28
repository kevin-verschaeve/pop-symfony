<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/articles")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/new", name="article_new")
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        if ($form->handleRequest($request)->isValid()) {
            $manager = $this->getDoctrine()->getManagerForClass(Article::class);
            $manager->persist($article);
            $manager->flush();

            return new RedirectResponse($this->generateUrl('article_show', [
                'id' => $article->getId(),
            ]));
        }

        return $this->render(':article:new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", requirements={"id": "\d+"})
     */
    public function showAction(Article $article)
    {
        return $this->render(':article:show.html.twig', [
            'article' => $article,
        ]);
    }
}
