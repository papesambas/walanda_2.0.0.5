<?php

namespace App\Test\Controller;

use App\Entity\Etablissements;
use App\Repository\EtablissementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EtablissementsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EtablissementsRepository $repository;
    private string $path = '/etablissements/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Etablissements::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Etablissement index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'etablissement[designation]' => 'Testing',
            'etablissement[formeJuridique]' => 'Testing',
            'etablissement[adresse]' => 'Testing',
            'etablissement[numDecisionCreation]' => 'Testing',
            'etablissement[numDecisionOuverture]' => 'Testing',
            'etablissement[dateOuverture]' => 'Testing',
            'etablissement[numSocial]' => 'Testing',
            'etablissement[numFiscal]' => 'Testing',
            'etablissement[telephone]' => 'Testing',
            'etablissement[telephoneMobile]' => 'Testing',
            'etablissement[cpteBancaire]' => 'Testing',
            'etablissement[email]' => 'Testing',
            'etablissement[createdAt]' => 'Testing',
            'etablissement[updatedAt]' => 'Testing',
            'etablissement[slug]' => 'Testing',
        ]);

        self::assertResponseRedirects('/etablissements/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Etablissements();
        $fixture->setDesignation('My Title');
        $fixture->setFormeJuridique('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setNumDecisionCreation('My Title');
        $fixture->setNumDecisionOuverture('My Title');
        $fixture->setDateOuverture('My Title');
        $fixture->setNumSocial('My Title');
        $fixture->setNumFiscal('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setTelephoneMobile('My Title');
        $fixture->setCpteBancaire('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Etablissement');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Etablissements();
        $fixture->setDesignation('My Title');
        $fixture->setFormeJuridique('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setNumDecisionCreation('My Title');
        $fixture->setNumDecisionOuverture('My Title');
        $fixture->setDateOuverture('My Title');
        $fixture->setNumSocial('My Title');
        $fixture->setNumFiscal('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setTelephoneMobile('My Title');
        $fixture->setCpteBancaire('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'etablissement[designation]' => 'Something New',
            'etablissement[formeJuridique]' => 'Something New',
            'etablissement[adresse]' => 'Something New',
            'etablissement[numDecisionCreation]' => 'Something New',
            'etablissement[numDecisionOuverture]' => 'Something New',
            'etablissement[dateOuverture]' => 'Something New',
            'etablissement[numSocial]' => 'Something New',
            'etablissement[numFiscal]' => 'Something New',
            'etablissement[telephone]' => 'Something New',
            'etablissement[telephoneMobile]' => 'Something New',
            'etablissement[cpteBancaire]' => 'Something New',
            'etablissement[email]' => 'Something New',
            'etablissement[createdAt]' => 'Something New',
            'etablissement[updatedAt]' => 'Something New',
            'etablissement[slug]' => 'Something New',
        ]);

        self::assertResponseRedirects('/etablissements/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDesignation());
        self::assertSame('Something New', $fixture[0]->getFormeJuridique());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getNumDecisionCreation());
        self::assertSame('Something New', $fixture[0]->getNumDecisionOuverture());
        self::assertSame('Something New', $fixture[0]->getDateOuverture());
        self::assertSame('Something New', $fixture[0]->getNumSocial());
        self::assertSame('Something New', $fixture[0]->getNumFiscal());
        self::assertSame('Something New', $fixture[0]->getTelephone());
        self::assertSame('Something New', $fixture[0]->getTelephoneMobile());
        self::assertSame('Something New', $fixture[0]->getCpteBancaire());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Etablissements();
        $fixture->setDesignation('My Title');
        $fixture->setFormeJuridique('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setNumDecisionCreation('My Title');
        $fixture->setNumDecisionOuverture('My Title');
        $fixture->setDateOuverture('My Title');
        $fixture->setNumSocial('My Title');
        $fixture->setNumFiscal('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setTelephoneMobile('My Title');
        $fixture->setCpteBancaire('My Title');
        $fixture->setEmail('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/etablissements/');
    }
}
