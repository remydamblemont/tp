<?php

namespace  App\Controller;


use App\Entity\BrandVehicule;
use App\Entity\ColorVehicule;
use App\Entity\Kind;
use App\Entity\ModelVehicule;
use App\Entity\Vehicule;
use App\Form\BrandType;
use App\Form\ColorVehiculeType;
use App\Form\KindType;
use App\Form\ModelType;
use App\Form\VehiculeType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class ManageCarController extends AbstractController
{

    private $em;
    private $serializer;

    public function __construct(ObjectManager $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/kind/create", name="create_kind")
     */
    public function createKind(Request $request)
    {
        $kind = new Kind();
        $form = $this->get('form.factory')->create(KindType::class, $kind);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($kind);
            $this->em->flush();
            return $this->redirectToRoute('all_kind');
        }

        return $this->render('Kind/createKind.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/kind", name="all_kind")
     */
    public function allKind()
    {
        $Kind = $this->em->getRepository(Kind::class)->findAll();
        return $this->render('Kind/Kind.html.twig', [
            'Kind' => $Kind
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("kind/update/{id}", name="update_kind")
     */
    public function updateKind(Request $request, $id)
    {
        $ressource = $this->em->getRepository(Kind::class)->find($id);
        if($ressource !== null)
        {
            $form = $this->get('form.factory')->create(KindType::class, $ressource);
            if($request->isMethod('POST') && $form->handleRequest($request))
            {
                $this->em->persist($ressource);
                $this->em->flush();
                return $this->redirectToRoute('all_kind');
            }
            return $this->render('Kind/updateKind.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été mise à jour car elle n\'existe pas');
            return $this->redirectToRoute('all_kind');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("kind/delete/{id}", name="delete_kind")
     */
    public function deleteKind(Request $request, $id)
    {
        $ressource = $this->em->getRepository(Kind::class)->find($id);
        if($ressource !== null)
        {
            $this->em->remove($ressource);
            $this->em->flush();
            return $this->redirectToRoute('all_kind');
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été supprimé car elle n\'existe pas');
            return $this->redirectToRoute('all_kind');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/color/create", name="create_color")
     */
    public function createColor(Request $request)
    {
        $color = new ColorVehicule();
        $form = $this->get('form.factory')->create(ColorVehiculeType::class, $color);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($color);
            $this->em->flush();
            return $this->redirectToRoute('all_color');
        }
        return $this->render('Color/createColor.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/color", name="all_color")
     */
    public function allColor()
    {
        $color = $this->em->getRepository(ColorVehicule::class)->findAll();
        return $this->render('Color/color.html.twig', [
            'Color' => $color
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/color/update/{id}", name="update_color")
     */
    public function updateColor(Request $request, $id)
    {
        $color = $this->em->getRepository(ColorVehicule::class)->find($id);
        if($color !== null)
        {
            $form = $this->get('form.factory')->create(ColorVehiculeType::class, $color);
            if($request->isMethod('POST') && $form->handleRequest($request))
            {
                $this->em->persist($color);
                $this->em->flush();
                return $this->redirectToRoute('all_color');
            }
            return $this->render('Color/updateColor.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été mise à jour car elle n\'existe pas');
            return $this->redirectToRoute('all_color');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/color/delete/{id}", name="delete_color")
     */
    public function deleteColor(Request $request, $id)
    {
        $color = $this->em->getRepository(ColorVehicule::class)->find($id);
        if($color !== null)
        {
            $this->em->remove($color);
            $this->em->flush();
            return $this->redirectToRoute('all_color');
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été supprimé car elle n\'existe pas');
            return $this->redirectToRoute('all_color');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/model/create", name="create_model")
     */
    public function createModel(Request $request)
    {
        $model = new ModelVehicule();
        $form = $this->get('form.factory')->create(ModelType::class, $model);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($model);
            $this->em->flush();
            return $this->redirectToRoute('all_model');
        }
        return $this->render('Model/createModel.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/model", name="all_model")
     */
    public function allModel()
    {
        $model = $this->em->getRepository(ModelVehicule::class)->findAll();
        return $this->render('Model/model.html.twig', [
            'Color' => $model
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/model/update/{id}", name="update_model")
     */
    public function updateModel(Request $request, $id)
    {
        $model = $this->em->getRepository(ModelVehicule::class)->find($id);
        if($model !== null)
        {
            $form = $this->get('form.factory')->create(ModelType::class, $model);
            if($request->isMethod('POST') && $form->handleRequest($request))
            {
                $this->em->persist($model);
                $this->em->flush();
                return $this->redirectToRoute('all_model');
            }
            return $this->render('Model/updateModel.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été mise à jour car elle n\'existe pas');
            return $this->redirectToRoute('all_model');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/model/delete/{id}", name="delete_model")
     */
    public function deleteModel(Request $request, $id)
    {
        $model = $this->em->getRepository(ModelVehicule::class)->find($id);
        if($model !== null)
        {
            $this->em->remove($model);
            $this->em->flush();
            return $this->redirectToRoute('all_model');
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été supprimé car elle n\'existe pas');
            return $this->redirectToRoute('all_model');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/brand/create", name="create_brand")
     */
    public function createBrand(Request $request)
    {
        $brand = new BrandVehicule();
        $form = $this->get('form.factory')->create(BrandType::class, $brand);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($brand);
            $this->em->flush();
            return $this->redirectToRoute('all_brand');
        }
        return $this->render('Brand/createBrand.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/brand", name="all_brand")
     */
    public function allBrand()
    {
        $brand = $this->em->getRepository(BrandVehicule::class)->findAll();
        return $this->render('Brand/brand.html.twig', [
            'Brand' => $brand
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/brand/update/{id}", name="update_brand")
     */
    public function updateBrand(Request $request, $id)
    {
        $brand = $this->em->getRepository(BrandVehicule::class)->find($id);
        if($brand !== null)
        {
            $form = $this->get('form.factory')->create(BrandType::class, $brand);
            if($request->isMethod('POST') && $form->handleRequest($request))
            {
                $this->em->persist($brand);
                $this->em->flush();
                return $this->redirectToRoute('all_brand');
            }
            return $this->render('Brand/updateBrand.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été mise à jour car elle n\'existe pas');
            return $this->redirectToRoute('all_brand');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/brand/delete/{id}", name="delete_brand")
     */
    public function deleteBrand(Request $request, $id)
    {
        $brand = $this->em->getRepository(BrandVehicule::class)->find($id);
        if($brand !== null)
        {
            $this->em->remove($brand);
            $this->em->flush();
            return $this->redirectToRoute('all_brand');
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été supprimé car elle n\'existe pas');
            return $this->redirectToRoute('all_brand');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/vehicule/create", name="create_vehicule")
     */
    public function createVehicule(Request $request)
    {
        $vehicule = new Vehicule();
        $form = $this->get('form.factory')->create(VehiculeType::class, $vehicule);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($vehicule);
            $this->em->flush();
            return $this->redirectToRoute('all_vehicule');
        }
        return $this->render('Vehicule/createVehicule.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/vehicule/request", name="request_vehicule")
     */
    public function requestVehicule(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $vehicule = $this->em->getRepository(Vehicule::class)->findAll();
            foreach ($vehicule as $vehicules) {
                $date = $vehicules->getCreated()->format('d-m-Y');
                $id = $vehicules->getId();
                $update = $this->generateUrl('update_vehicule', ['id' => $id]);
                $delete = $this->generateUrl('delete_vehicule', ['id' => $id]);
                $output['data'][] = [
                    'Type' => $vehicules->getKind()->getType(),
                    'Marque' => $vehicules->getBrand()->getName(),
                    'Model' => $vehicules->getModel()->getName(),
                    'Color' => $vehicules->getColor()->getColor(),
                    'Seat' => $vehicules->getSeat(),
                    'Created' => $date,
                    'Update' => $update,
                    'Delete' => $delete,
                ];
            }
            $data = $this->serializer->serialize($output, 'json');
            return new Response($data, 200, ['Content-Type' => 'application/json']);
        }
    }

    /**
     * @return Response
     * @Route("/vehicule", name="all_vehicule")
     */
    public function allVehicule()
    {
        return $this->render('Vehicule/vehicule.html.twig', []);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/vehicule/update/{id}", name="update_vehicule")
     */
    public function updateVehicule(Request $request, $id)
    {
        $vehicule = $this->em->getRepository(Vehicule::class)->find($id);
        if($vehicule !== null)
        {
            $form = $this->get('form.factory')->create(VehiculeType::class, $vehicule);
            if($request->isMethod('POST') && $form->handleRequest($request))
            {
                $this->em->persist($vehicule);
                $this->em->flush();
                return $this->redirectToRoute('all_vehicule');
            }
            return $this->render('Vehicule/updateVehicule.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été mise à jour car elle n\'existe pas');
            return $this->redirectToRoute('all_vehicule');
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/vehicule/delete/{id}", name="delete_vehicule")
     */
    public function deleteVehicule(Request $request, $id)
    {
        $vehicule = $this->em->getRepository(Vehicule::class)->find($id);
        if($vehicule !== null)
        {
            $this->em->remove($vehicule);
            $this->em->flush();
            return $this->redirectToRoute('all_vehicule');
        } else {
            $this->addFlash('error', 'La ressource n\'a pas été supprimé car elle n\'existe pas');
            return $this->redirectToRoute('all_vehicule');
        }
    }
}