<?php

namespace App\Repository;
use App\Entity\PieceGenerale;
use App\Entity\PieceSpecifique;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceSpecifiqueRepository extends ServiceEntityRepository
{
   private $manager;

    public function __construct
    (
        ManagerRegistry $registry,
        EntityManagerInterface $manager
    )
    {
        parent::__construct($registry, PieceSpecifique::class);
        $this->manager = $manager;
    }

    public function savePieceSpecifique($Code, $Designation,$Marque,$piece_generale_id)
    {
        $newPieceSpecifique = new PieceSpecifique();
        

        $newPieceSpecifique
            ->setCode($Code)
            ->setDesignation($Designation)
            ->setMarque($Marque)
            ->getPieceGenerale($piece_generale_id);

        $this->manager->persist($newPieceSpecifique);
        $this->manager->flush();
    }
    public function updatePieceSpecifique(PieceSpecifique $pieceSpecifique): PieceSpecifique
{
    
    $this->manager->persist($pieceSpecifique);
    $this->manager->flush();

    return $pieceSpecifique;
}
public function removePieceSpecifique(PieceSpecifique $pieceSpecifique)
{
    $this->manager->remove($pieceSpecifique);
    $this->manager->flush();
}
}
