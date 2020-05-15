<?php
namespace App\Tests\Service;

use App\Entity\Soggetto;
use App\Service\JsonSerializer;
use PHPUnit\Framework\TestCase;

class JsonSerializerTestTest extends TestCase
{
    private JsonSerializer $jsonSerializer;

    protected function setUp()
    {
        $this->jsonSerializer = new JsonSerializer();
    }

    public function testSerializeSoggettoShouldReturnAValidArray()
    {
        $soggetto = new Soggetto("Mario", "Rossi", "via roma 1, Jesi(AN)", "m.rossi@gmailcom", 1);

        $result = $this->jsonSerializer->serializeToArray($soggetto);

        $this->assertEquals("Mario", $result["nome"]);
    }

    public function testSerializeArrayOfSoggettoShouldReturnAValidArray()
    {
        $soggetto1 = new Soggetto("Mario", "Rossi", "via roma 1, Jesi(AN)", "m.rossi@gmailcom", 1);
        $soggetto2 = new Soggetto("Anna", "Verdi", "via ancona 2, Apiro(MC)", "a.verdi@gmailcom", 2);

        $result = $this->jsonSerializer->serializeToArray([$soggetto1, $soggetto2]);

        $this->assertCount(2, $result);
        $this->assertEquals("Mario", $result[0]['nome']);
        $this->assertEquals("Anna", $result[1]['nome']);
    }

}