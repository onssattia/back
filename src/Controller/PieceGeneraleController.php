<?php

namespace App\Controller;

  
  
use App\Entity\PieceGenerale;
use App\Repository\PieceGeneraleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PieceGeneraleController 
{
    private $pieceGeneraleRepository;

    public function __construct(PieceGeneraleRepository $pieceGeneraleRepository)
    {
        $this->pieceGeneraleRepository = $pieceGeneraleRepository;
    }

    /**
     * @Route("/pieceGenerale/", name="add_pieceGenerale", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $CodeInterne = $data['CodeInterne'];
        $Designation = $data['Designation'];
        if (empty($CodeInterne) || empty($Designation)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->pieceGeneraleRepository->savePieceGenerale($CodeInterne, $Designation);
        

        return new JsonResponse($data, Response::HTTP_CREATED);
    }
    /**
 * @Route("/pieceGenerale/{id}", name="get_one_pieceGenerale", methods={"GET"})
 */
public function get($id): JsonResponse
{
    $pieceGenerale = $this->pieceGeneraleRepository->findOneBy(['id' => $id]);

    $data = [
        'id' => $pieceGenerale->getId(),
        'CodeInterne' => $pieceGenerale->getCodeInterne(),
        'Designation' => $pieceGenerale->getDesignation(),
        
    ];

    return new JsonResponse($data, Response::HTTP_OK);
}
/**
 * @Route("/pieceGenerale", name="get_all_pieceGenerale", methods={"GET"})
 */
public function getAll(): JsonResponse
{
    $pieceGenerales = $this->pieceGeneraleRepository->findAll();
    $data = [];

    foreach ($pieceGenerales as $pieceGenerale) {
        $data[] = [
            'id' => $pieceGenerale->getId(),
            'CodeInterne' => $pieceGenerale->getCodeInterne(),
            'Designation' => $pieceGenerale->getDesignation(),
            
        ];
    }

    return new JsonResponse($data, Response::HTTP_OK);
}
/**
 * @Route("/pieceGenerale/{id}", name="update_pieceGenerale", methods={"PUT"})
 */
public function update($id, Request $request): JsonResponse
{
    $pieceGenerale = $this->pieceGeneraleRepository->findOneBy(['id' => $id]);
    
    $data = json_decode($request->getContent(), true);

    empty($data['CodeInterne']) ? true : $pieceGenerale->setCodeInterne($data['CodeInterne']);
    empty($data['Designation']) ? true : $pieceGenerale->setDesignation($data['Designation']);
  

    $updatePieceGenerale = $this->pieceGeneraleRepository->updatePieceGenerale($pieceGenerale);
    $data = [
        'id' => $updatePieceGenerale->getId(),
        'CodeInterne' => $updatePieceGenerale->getCodeInterne(),
        'Designation' => $updatePieceGenerale->getDesignation(),
        
    ];

    return new JsonResponse($data, Response::HTTP_OK);
}
/**
 * @Route("/pieceGenerale/{id}", name="delete_pieceGenerale", methods={"DELETE"})
 */

public function delete($id): JsonResponse
{
    $pieceGenerale = $this->pieceGeneraleRepository->findOneBy(['id' => $id]);

    $this->pieceGeneraleRepository->removePieceGenerale($pieceGenerale);

    return new JsonResponse(['status' => 'pieceGenerale deleted'], Response::HTTP_NO_CONTENT);
}

}


