<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Yepsua\SecurityBundle\YepsuaSecurityBundle(),
            new Yepsua\MenuBundle\YepsuaMenuBundle(),
            new Yepsua\SmarTwigBundle\YepsuaSmarTwigBundle(),
            new Yepsua\CommonsBundle\YepsuaCommonsBundle(),
            new Yepsua\GeneratorBundle\YepsuaGeneratorBundle(),
            new Yepsua\ThemeBundle\YepsuaThemeBundle(),
            new Yepsua\LocalizationBundle\YepsuaLocalizationBundle(),
            //new Utopia\CoreBundle\UtopiaCoreBundle(),
            new OpenSkool\ThemeBundle\OpenSkoolThemeBundle(),
            //new Utopia\LocalizationBundle\UtopiaLocalizationBundle(),
            new OpenSkool\CoreBundle\OpenSkoolCoreBundle(),
            new OpenSkool\AdminBundle\OpenSkoolAdminBundle(),
            new OpenSkool\PeopleBundle\OpenSkoolPeopleBundle(),
            new OpenSkool\SecurityBundle\OpenSkoolSecurityBundle(),
            new Yepsua\LOVBundle\YepsuaLOVBundle(),
            new OpenSkool\LOVBundle\OpenSkoolLOVBundle(),
            new Yepsua\RADBundle\YepsuaRADBundle(),
            new Yepsua\LocalityBundle\YepsuaLocalityBundle(),
            new OpenSkool\LocalityBundle\OpenSkoolLocalityBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new OpenSkool\AssetsBundle\OpenSkoolAssetsBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
