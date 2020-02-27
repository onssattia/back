<?php

namespace App\Repository;

use App\Entity\PieceGenerale;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceGeneraleRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct
    (
        ManagerRegistry $registry,
        EntityManagerInterface $manager
    )
    {
        parent::__construct($registry, PieceGenerale::class);
        $this->manager = $manager;
    }

    public function savePieceGenerale($CodeInterne, $Designation)
    {
        $newPieceGenerale = new PieceGenerale();

        $newPieceGenerale
            ->setCodeInterne($CodeInterne)
            ->setDesignation($Designation);      
        $this->manager->persist($newPieceGenerale);
        $this->manager->flush();
    }
    public function updatePieceGenerale(PieceGenerale $pieceGenerale): PieceGenerale
{
    
    $this->manager->persist($pieceGenerale);
    $this->manager->flush();

    return $pieceGenerale;
}
public function removePieceGenerale(PieceGenerale $pieceGenerale)
{
    $this->manager->remove($pieceGenerale);
    $this->manager->flush();
}
}
