<?php

namespace App\Command;

use App\Services\AlgorithmeService;
use Exception;
use ReflectionClass;
use SplFileObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @author Benjamin Manguet <benjamin.manguet@gmail.com>
 */
class AlgoTestCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'algo:result';

    /**
     * @var AlgorithmeService
     */
    private $algoService;

    /**
     * @param AlgorithmeService $algoService
     * @param string|null $name
     */
    public function __construct(AlgorithmeService $algoService, string $name = null)
    {
        $this->algoService = $algoService;

        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Command for testing algos.')
            ->setHelp('This command check you service...')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $question = $io->choice('Quel algo voulez-vous résoudre', ['1', '2']);

        switch ($question) {
            case '1':
                $result = $this->checkFirstAlgo($io);
                break;
            case '2':
                $result = $this->checkSecondAlgo($io);
                break;
            default:
                $io->error('Votre réponse est en dehors des possibilités');
                exit();
        }

        if ($result === 'error') {
            $io->error('L\'algorithme présente une erreur');
            exit();
        }

        $io->success('Votre algorithme est correct');
        return 0;
    }

    /**
     * @param SymfonyStyle $io
     *
     * @return string
     *
     * @throws Exception
     */
    private function checkFirstAlgo(SymfonyStyle $io): string
    {
        $this->testAlgoMethodCreated($io, 'First');

        $firstResult = $this->getAlgoResultFirst();
        $secondResult = $this->getAlgoResultFirstMinorThree();

        if ($firstResult && $secondResult) {
            return 'success';
        }

        return 'error';
    }

    /**
     * @param SymfonyStyle $io
     *
     * @return string
     */
    private function checkSecondAlgo(SymfonyStyle $io): string
    {
        $this->testAlgoMethodCreated($io, 'Second');

        $result = $this->algoService->algoSecond();

        if ($result !== range(0,10)) {
            return 'error';
        }

        $isFileCorrect = $this->checkSecondAlgoMethod();

        if (!$isFileCorrect) {
            return 'error';
        }

        return 'success';
    }

    /**
     * @param SymfonyStyle $io
     * @param string $stringNumberAlgo
     *
     * @return void
     */
    private function testAlgoMethodCreated(SymfonyStyle $io, string $stringNumberAlgo): void
    {
        $algo = new ReflectionClass(AlgorithmeService::class);

        try {
            $algo = $algo->getMethod('algo' . $stringNumberAlgo);
        } catch (Exception $exception) {
            $io->error('Il n\'a pas de méthode nommée "algo' . $stringNumberAlgo . '" dans ' . $algo->name);
            exit();
        }

        if ($algo->getModifiers() !== 1) {
            $io->error('La méthode algo' . $stringNumberAlgo . ' doit être public.');
            exit();
        }
    }

    /**
     * @throws Exception
     */
    private function getAlgoResultFirst(): bool
    {
        $numbers = [];

        for ($i = 0; $i < 900; $i++) {
            $numbers[] = random_int(-200000, 600000);
        }

        $result = [];
        foreach ($numbers as $number) {

            if (count($result) < 3) {
                $result[] = $number;

            } else if ($number > min($result)) {

                $min = array_search(min($result), $result, true);

                $result[$min] = $number;
            }
        }

        rsort($result);

        $finalResult = [];
        foreach ($result as $index => $item) {

            $finalResult[++$index] = $item;
        }

        $resultTest = $this->algoService->algoFirst($numbers);

        return $finalResult === $resultTest;
    }

    /**
     * @return bool
     */
    private function getAlgoResultFirstMinorThree(): bool
    {
        $numbers = [1];

        $result = $this->algoService->algoFirst($numbers);

        return $result === 'Invalid';
    }

    /**
     * @return bool
     */
    private function checkSecondAlgoMethod(): bool
    {
        $service = new ReflectionClass(AlgorithmeService::class);

        $method = $service->getMethod('algoSecond');

        $methodStart = $method->getStartLine();
        $methodEnd   = $method->getEndLine();

        $file = new SplFileObject(__DIR__ . '/../../src/Services/AlgorithmeService.php');

        $fileContent = [];
        while(!$file->eof())
        {

            $fileContent[] = $file->fgets();
        }

        $methodLines = array_slice($fileContent, $methodStart, ($methodEnd - $methodStart));

        foreach ($methodLines as $methodLine) {

            for ($i = 0; $i <= strlen($methodLine)-1; $i++) {
                $char = $methodLine[$i];

                if (in_array($char, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], true))
                {
                    return false;
                }
            }
        }

        return true;
    }
}
