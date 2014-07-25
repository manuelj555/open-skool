<?php

namespace OpenSkool\PeopleBundle\Entity\Repository;

use Yepsua\RADBundle\ORM\EntityRepository;
use Yepsua\SecurityBundle\Entity\User;
use OpenSkool\PeopleBundle\Entity\Person;

/**
 * PersonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonRepository extends EntityRepository
{
    const REPOSITORY_NAMESPACE = 'OpenSkoolPeopleBundle:Person';
    
    /**
     * 
     * @param \Yepsua\SecurityBundle\Entity\User $user
     * @return type
     */
    public function createUserDetail(User $user = null){
      $em = $this->getEntityManager();
      $person =  self::emptyPerson();
      $person->setUser($user);
      $user->setUserDetail($person);
      $em->persist($user);
      $em->flush();
      return $user->getUserDetail();
    }
    
    public static function emptyPerson(){
      $person = new Person();
      $person->setFirstName("");
      $person->setLastName("");
      $person->setIdNumber(0);
      $person->setBirthdate(new \DateTime());
      return $person;
    }
}