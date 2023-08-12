<?php

namespace App\Test\Controller;

use App\Entity\Classes;
use App\Repository\ClassesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClassesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ClassesRepository $repository;
    private string $path = '/classes/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Classes::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Class index');

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
            'class[designation]' => 'Testing',
            'class[capacite]' => 'Testing',
            'class[effectif]' => 'Testing',
            'class[disponibilite]' => 'Testing',
            'class[createdAt]' => 'Testing',
            'class[updatedAt]' => 'Testing',
            'class[slug]' => 'Testing',
            'class[niveau]' => 'Testing',
        ]);

        self::assertResponseRedirects('/classes/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Classes();
        $fixture->setDesignation('My Title');
        $fixture->setCapacite('My Title');
        $fixture->setEffectif('My Title');
        $fixture->setDisponibilite('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNiveau('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Class');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Classes();
        $fixture->setDesignation('My Title');
        $fixture->setCapacite('My Title');
        $fixture->setEffectif('My Title');
        $fixture->setDisponibilite('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNiveau('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'class[designation]' => 'Something New',
            'class[capacite]' => 'Something New',
            'class[effectif]' => 'Something New',
            'class[disponibilite]' => 'Something New',
            'class[createdAt]' => 'Something New',
            'class[updatedAt]' => 'Something New',
            'class[slug]' => 'Something New',
            'class[niveau]' => 'Something New',
        ]);

        self::assertResponseRedirects('/classes/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDesignation());
        self::assertSame('Something New', $fixture[0]->getCapacite());
        self::assertSame('Something New', $fixture[0]->getEffectif());
        self::assertSame('Something New', $fixture[0]->getDisponibilite());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getNiveau());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Classes();
        $fixture->setDesignation('My Title');
        $fixture->setCapacite('My Title');
        $fixture->setEffectif('My Title');
        $fixture->setDisponibilite('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNiveau('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/classes/');
    }
}
