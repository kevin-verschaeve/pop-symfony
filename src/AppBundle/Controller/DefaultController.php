<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }

    /**
     * @Route("/{name}", name="hello", defaults={"name" = "world"})
     */
    public function helloAction($name)
    {
        return $this->render(':default:hello.html.twig', [
            'name' => $name
        ]);
    }

    /**
     * @Route("/service/{operation}/{a}/{b}", name="service")
     */
    public function serviceAction($operation, $a, $b)
    {
        $calculator = $this->get('app.my_project.calculator');

        if (!method_exists($calculator, $operation)) {
            $result = sprintf('%s: operation invalide', $operation);
        } else {
            $result = $calculator->$operation($a, $b);
        }

        return $this->render(':default:service.html.twig', [
            'result' => $result
        ]);
    }
}
