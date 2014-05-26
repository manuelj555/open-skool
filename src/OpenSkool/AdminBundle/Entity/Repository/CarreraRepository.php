<?php

namespace OpenSkool\AdminBundle\Entity\Repository;

use Yepsua\RADBundle\ORM\EntityRepository;

use OpenSkool\AdminBundle\Entity\Instituto;

/**
 * CarreraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarreraRepository extends EntityRepository
{
    /**
     * 
     * @param \OpenSkool\AdminBundle\Entity\Instituto $instituto
     */
    public function synchronizeInstitutos(Instituto $instituto){
        $carreras = $this->findAll();
        if($carreras !== null){
            $em = $this->getEntityManager();
            foreach($carreras as $carrera){
                $pensumEstudio = new Pensum();
                $pensumEstudio->setCarrera($carrera);
                $pensumEstudio->setInstituto($instituto);
                $em->persist($pensumEstudio);
            }
            $em->flush();
        }
    }
}
