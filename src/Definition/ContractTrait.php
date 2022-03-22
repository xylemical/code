<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with contracts.
 */
trait ContractTrait {

  /**
   * The contracts for this definition.
   *
   * @var \Xylemical\Code\Definition\Contract[]
   */
  protected array $contracts = [];

  /**
   * Set the contracts for the definition.
   *
   * @param \Xylemical\Code\Definition\Contract[] $contracts
   *   The contracts.
   *
   * @return $this
   */
  public function setContracts(array $contracts): static {
    $this->contracts = [];
    $this->addContracts($contracts);
    return $this;
  }

  /**
   * Add the contracts to the definition.
   *
   * @param \Xylemical\Code\Definition\Contract[] $contracts
   *   The contracts.
   *
   * @return $this
   */
  public function addContracts(array $contracts): static {
    foreach ($contracts as $contract) {
      $this->setContract($contract);
    }
    return $this;
  }

  /**
   * Set an individual contract.
   *
   * @param \Xylemical\Code\Definition\Contract $contract
   *   The contract.
   *
   * @return $this
   */
  public function setContract(Contract $contract): static {
    $this->contracts[strtolower($contract->getName())] = $contract;
    return $this;
  }

  /**
   * Get a contract by name.
   *
   * @param string $name
   *   The contract.
   *
   * @return \Xylemical\Code\Definition\Contract|null
   *   The contract.
   */
  public function getContract(string $name): ?Contract {
    $name = strtolower($name);
    if (isset($this->contracts[$name])) {
      return $this->contracts[$name];
    }
    return NULL;
  }

  /**
   * Get all the contracts.
   *
   * @return \Xylemical\Code\Definition\Contract[]
   *   The contracts.
   */
  public function getContracts(): array {
    return array_values($this->contracts);
  }

  /**
   * Remove a contract from the definition.
   *
   * @param string $contract
   *   The contract.
   *
   * @return $this
   */
  public function removeContract(string $contract): static {
    $contract = strtolower($contract);
    unset($this->contracts[$contract]);
    return $this;
  }

}
