<?php

namespace App\Test\Controller;

use App\Entity\Eleves;
use App\Repository\ElevesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ElevesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ElevesRepository $repository;
    private string $path = '/eleves/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Eleves::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Elefe index');

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
            'elefe[matricule]' => 'Testing',
            'elefe[sexe]' => 'Testing',
            'elefe[statutFinance]' => 'Testing',
            'elefe[dateNaissance]' => 'Testing',
            'elefe[dateExtrait]' => 'Testing',
            'elefe[numExtrait]' => 'Testing',
            'elefe[isAdmis]' => 'Testing',
            'elefe[isActif]' => 'Testing',
            'elefe[isHandicap]' => 'Testing',
            'elefe[natureHandicap]' => 'Testing',
            'elefe[dateInscription]' => 'Testing',
            'elefe[dateRecrutement]' => 'Testing',
            'elefe[fullname]' => 'Testing',
            'elefe[adresse]' => 'Testing',
            'elefe[createdAt]' => 'Testing',
            'elefe[updatedAt]' => 'Testing',
            'elefe[slug]' => 'Testing',
            'elefe[nom]' => 'Testing',
            'elefe[prenom]' => 'Testing',
            'elefe[lieuNaissance]' => 'Testing',
            'elefe[classe]' => 'Testing',
            'elefe[statut]' => 'Testing',
            'elefe[ecoleAnDernier]' => 'Testing',
            'elefe[ecoleRecrutement]' => 'Testing',
            'elefe[departement]' => 'Testing',
            'elefe[scolarite1]' => 'Testing',
            'elefe[scolarite2]' => 'Testing',
            'elefe[scolarite3]' => 'Testing',
            'elefe[redoublement1]' => 'Testing',
            'elefe[redoublement2]' => 'Testing',
            'elefe[redoublement3]' => 'Testing',
            'elefe[user]' => 'Testing',
            'elefe[parent]' => 'Testing',
        ]);

        self::assertResponseRedirects('/eleves/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Eleves();
        $fixture->setMatricule('My Title');
        $fixture->setSexe('My Title');
        $fixture->setStatutFinance('My Title');
        $fixture->setDateNaissance('My Title');
        $fixture->setDateExtrait('My Title');
        $fixture->setNumExtrait('My Title');
        $fixture->setIsAdmis('My Title');
        $fixture->setIsActif('My Title');
        $fixture->setIsHandicap('My Title');
        $fixture->setNatureHandicap('My Title');
        $fixture->setDateInscription('My Title');
        $fixture->setDateRecrutement('My Title');
        $fixture->setFullname('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setLieuNaissance('My Title');
        $fixture->setClasse('My Title');
        $fixture->setStatut('My Title');
        $fixture->setEcoleAnDernier('My Title');
        $fixture->setEcoleRecrutement('My Title');
        $fixture->setDepartement('My Title');
        $fixture->setScolarite1('My Title');
        $fixture->setScolarite2('My Title');
        $fixture->setScolarite3('My Title');
        $fixture->setRedoublement1('My Title');
        $fixture->setRedoublement2('My Title');
        $fixture->setRedoublement3('My Title');
        $fixture->setUser('My Title');
        $fixture->setParent('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Elefe');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Eleves();
        $fixture->setMatricule('My Title');
        $fixture->setSexe('My Title');
        $fixture->setStatutFinance('My Title');
        $fixture->setDateNaissance('My Title');
        $fixture->setDateExtrait('My Title');
        $fixture->setNumExtrait('My Title');
        $fixture->setIsAdmis('My Title');
        $fixture->setIsActif('My Title');
        $fixture->setIsHandicap('My Title');
        $fixture->setNatureHandicap('My Title');
        $fixture->setDateInscription('My Title');
        $fixture->setDateRecrutement('My Title');
        $fixture->setFullname('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setLieuNaissance('My Title');
        $fixture->setClasse('My Title');
        $fixture->setStatut('My Title');
        $fixture->setEcoleAnDernier('My Title');
        $fixture->setEcoleRecrutement('My Title');
        $fixture->setDepartement('My Title');
        $fixture->setScolarite1('My Title');
        $fixture->setScolarite2('My Title');
        $fixture->setScolarite3('My Title');
        $fixture->setRedoublement1('My Title');
        $fixture->setRedoublement2('My Title');
        $fixture->setRedoublement3('My Title');
        $fixture->setUser('My Title');
        $fixture->setParent('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'elefe[matricule]' => 'Something New',
            'elefe[sexe]' => 'Something New',
            'elefe[statutFinance]' => 'Something New',
            'elefe[dateNaissance]' => 'Something New',
            'elefe[dateExtrait]' => 'Something New',
            'elefe[numExtrait]' => 'Something New',
            'elefe[isAdmis]' => 'Something New',
            'elefe[isActif]' => 'Something New',
            'elefe[isHandicap]' => 'Something New',
            'elefe[natureHandicap]' => 'Something New',
            'elefe[dateInscription]' => 'Something New',
            'elefe[dateRecrutement]' => 'Something New',
            'elefe[fullname]' => 'Something New',
            'elefe[adresse]' => 'Something New',
            'elefe[createdAt]' => 'Something New',
            'elefe[updatedAt]' => 'Something New',
            'elefe[slug]' => 'Something New',
            'elefe[nom]' => 'Something New',
            'elefe[prenom]' => 'Something New',
            'elefe[lieuNaissance]' => 'Something New',
            'elefe[classe]' => 'Something New',
            'elefe[statut]' => 'Something New',
            'elefe[ecoleAnDernier]' => 'Something New',
            'elefe[ecoleRecrutement]' => 'Something New',
            'elefe[departement]' => 'Something New',
            'elefe[scolarite1]' => 'Something New',
            'elefe[scolarite2]' => 'Something New',
            'elefe[scolarite3]' => 'Something New',
            'elefe[redoublement1]' => 'Something New',
            'elefe[redoublement2]' => 'Something New',
            'elefe[redoublement3]' => 'Something New',
            'elefe[user]' => 'Something New',
            'elefe[parent]' => 'Something New',
        ]);

        self::assertResponseRedirects('/eleves/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMatricule());
        self::assertSame('Something New', $fixture[0]->getSexe());
        self::assertSame('Something New', $fixture[0]->getStatutFinance());
        self::assertSame('Something New', $fixture[0]->getDateNaissance());
        self::assertSame('Something New', $fixture[0]->getDateExtrait());
        self::assertSame('Something New', $fixture[0]->getNumExtrait());
        self::assertSame('Something New', $fixture[0]->getIsAdmis());
        self::assertSame('Something New', $fixture[0]->getIsActif());
        self::assertSame('Something New', $fixture[0]->getIsHandicap());
        self::assertSame('Something New', $fixture[0]->getNatureHandicap());
        self::assertSame('Something New', $fixture[0]->getDateInscription());
        self::assertSame('Something New', $fixture[0]->getDateRecrutement());
        self::assertSame('Something New', $fixture[0]->getFullname());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getLieuNaissance());
        self::assertSame('Something New', $fixture[0]->getClasse());
        self::assertSame('Something New', $fixture[0]->getStatut());
        self::assertSame('Something New', $fixture[0]->getEcoleAnDernier());
        self::assertSame('Something New', $fixture[0]->getEcoleRecrutement());
        self::assertSame('Something New', $fixture[0]->getDepartement());
        self::assertSame('Something New', $fixture[0]->getScolarite1());
        self::assertSame('Something New', $fixture[0]->getScolarite2());
        self::assertSame('Something New', $fixture[0]->getScolarite3());
        self::assertSame('Something New', $fixture[0]->getRedoublement1());
        self::assertSame('Something New', $fixture[0]->getRedoublement2());
        self::assertSame('Something New', $fixture[0]->getRedoublement3());
        self::assertSame('Something New', $fixture[0]->getUser());
        self::assertSame('Something New', $fixture[0]->getParent());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Eleves();
        $fixture->setMatricule('My Title');
        $fixture->setSexe('My Title');
        $fixture->setStatutFinance('My Title');
        $fixture->setDateNaissance('My Title');
        $fixture->setDateExtrait('My Title');
        $fixture->setNumExtrait('My Title');
        $fixture->setIsAdmis('My Title');
        $fixture->setIsActif('My Title');
        $fixture->setIsHandicap('My Title');
        $fixture->setNatureHandicap('My Title');
        $fixture->setDateInscription('My Title');
        $fixture->setDateRecrutement('My Title');
        $fixture->setFullname('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setSlug('My Title');
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setLieuNaissance('My Title');
        $fixture->setClasse('My Title');
        $fixture->setStatut('My Title');
        $fixture->setEcoleAnDernier('My Title');
        $fixture->setEcoleRecrutement('My Title');
        $fixture->setDepartement('My Title');
        $fixture->setScolarite1('My Title');
        $fixture->setScolarite2('My Title');
        $fixture->setScolarite3('My Title');
        $fixture->setRedoublement1('My Title');
        $fixture->setRedoublement2('My Title');
        $fixture->setRedoublement3('My Title');
        $fixture->setUser('My Title');
        $fixture->setParent('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/eleves/');
    }
}
