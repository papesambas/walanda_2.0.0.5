<?php

namespace App\Test\Controller;

use App\Entity\Peres;
use App\Repository\PeresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeresControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private PeresRepository $repository;
    private string $path = '/peres/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Peres::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Pere index');

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
            'pere[fullname]' => 'Testing',
            'pere[createdAt]' => 'Testing',
            'pere[updatedAt]' => 'Testing',
            'pere[slug]' => 'Testing',
            'pere[nom]' => 'Testing',
            'pere[prenom]' => 'Testing',
            'pere[profession]' => 'Testing',
            'pere[telephone]' => 'Testing',
            'pere[nina]' => 'Testing',
        ]);

        self::assertResponseRedirects('/peres/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Peres();
        $fixture->setFullname('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setProfession('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setNina('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Pere');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Peres();
        $fixture->setFullname('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setProfession('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setNina('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'pere[fullname]' => 'Something New',
            'pere[createdAt]' => 'Something New',
            'pere[updatedAt]' => 'Something New',
            'pere[slug]' => 'Something New',
            'pere[nom]' => 'Something New',
            'pere[prenom]' => 'Something New',
            'pere[profession]' => 'Something New',
            'pere[telephone]' => 'Something New',
            'pere[nina]' => 'Something New',
        ]);

        self::assertResponseRedirects('/peres/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getFullname());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getProfession());
        self::assertSame('Something New', $fixture[0]->getTelephone());
        self::assertSame('Something New', $fixture[0]->getNina());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Peres();
        $fixture->setFullname('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setProfession('My Title');
        $fixture->setTelephone('My Title');
        $fixture->setNina('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/peres/');
    }
}
