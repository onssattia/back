<?php

namespace App\Controller;

use App\Entity\PieceSpecifique;
use App\Repository\PieceSpecifiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PieceSpecifiqueController 

{
    private $pieceSpecifiqueRepository;

    public function __construct(PieceSpecifiqueRepository $pieceSpecifiqueRepository)
    {
        $this->pieceSpecifiqueRepository = $pieceSpecifiqueRepository;
    }

    /**
     * @Route("/specifique/", name="add_PieceSpecifique", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        $Code = $data['Code'];
        $Designation = $data['Designation'];
        $Marque = $data['Marque'];
        $piece_generale_id=$data['piece_generale_id'];
       if (empty($Code) || empty($Designation) || empty($Marque) || empty($piece_generale_id)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->pieceSpecifiqueRepository->savePieceSpecifique($Code, $Designation,$Marque,$piece_generale_id);
        

        return new JsonResponse($data, Response::HTTP_CREATED,['groups' => 'post:read']);
    }
    /**
 * @Route("/PieceSpecifique/{id}", name="get_one_PieceSpecifique", methods={"GET"})
 */
public function get($id): JsonResponse
{
    $pieceSpecifique = $this->pieceSpecifiqueRepository->findOneBy(['id' => $id]);

    $data = [
        'id' => $pieceSpecifique->getId(),
        'Code' => $pieceSpecifique->getCode(),
        'Designation' => $pieceSpecifique->getDesignation(),
        'Marque' => $pieceSpecifique->getMarque(),
        
    ];

    return new JsonResponse($data, Response::HTTP_OK);
}
/**
 * @Route("/PieceSpecifique", name="get_all_PieceSpecifique", methods={"GET"})
 */
public function getAll(): JsonResponse
{
    $pieceSpecifiques = $this->pieceSpecifiqueRepository->findAll();
    $data = [];

    foreach ($pieceSpecifiques as $pieceSpecifique) {
        $data[] = [
            'id' => $pieceSpecifique->getId(),
            'Code' => $pieceSpecifique->getCode(),
            'Designation' => $pieceSpecifique->getDesignation(),
            'Marque' => $pieceSpecifique->getMarque(),
            
        ];
    }

    return new JsonResponse($data, Response::HTTP_OK,['groups' => 'post:read']);
}
/**
 * @Route("/PieceSpecifique/{id}", name="update_PieceSpecifique", methods={"PUT"})
 */
public function update($id, Request $request): JsonResponse
{
    $pieceSpecifique = $this->pieceSpecifiqueRepository->findOneBy(['id' => $id]);
    
    $data = json_decode($request->getContent(), true);

    empty($data['Code']) ? true : $pieceSpecifique->setCode($data['Code']);
    empty($data['Designation']) ? true : $pieceSpecifique->setDesignation($data['Designation']);
    empty($data['Marque']) ? true : $pieceSpecifique->setDesignation($data['Marque']);
  

  

    $updatePieceSpecifique = $this->pieceSpecifiqueRepository->updatePieceSpecifique($pieceSpecifique);
    $data = [
        'id' => $updatePieceSpecifique->getId(),
        'Code' => $updatePieceSpecifique->getCode(),
        'Designation' => $updatePieceSpecifique->getDesignation(),
        'Marque' => $updatePieceSpecifique->getMarque(),
    ];

    return new JsonResponse($data, Response::HTTP_OK,['groups' => 'post:read']);
}
/**
 * @Route("/PieceSpecifique/{id}", name="delete_PieceSpecifique", methods={"DELETE"})
 */

public function delete($id): JsonResponse
{
    $pieceSpecifique = $this->pieceSpecifiqueRepository->findOneBy(['id' => $id]);

    $this->pieceSpecifiqueRepository->removePieceSpecifique($pieceSpecifique);

    return new JsonResponse(['status' => 'pieceSpecifique deleted'], Response::HTTP_NO_CONTENT,['groups' => 'post:read']);
}

}
