# paf-nfce-sc — Constituição do Módulo

> SDK PHP para geração do PAF-NFC-e de Santa Catarina (Programa Aplicativo Fiscal para NFC-e/SC). SDK externo — não modificar sem aprovação.

## Identidade
- Módulo: paf-nfce-sc — SDK PAF-NFC-e Santa Catarina
- Fork: `zucchetti-pos/paf-nfce-sc`
- Parte do monorepo: zweb-projects

## Stack
- **Linguagem:** PHP ≥7.0
- **Dependências:** `nfephp-org/sped-common`
- **Testes:** PHPUnit ^9.4 + phpcs (PSR-2) + phpstan (nível 7)
- **Gerenciador:** Composer

## Estrutura de pastas
```
paf-nfce-sc/
├── src/
│   ├── Blocks/         # Blocos do arquivo PAF-NFC-e
│   ├── Common/         # Classes utilitárias comuns
│   ├── Elements/       # Elementos dos registros PAF
│   ├── PAFNFCeBuilder.php # Construtor do arquivo PAF
│   └── PAFNFCe.php        # Classe principal
├── tests/              # Testes PHPUnit
└── phpunit.xml
```

## Comandos do projeto
```bash
# Instalar dependências
composer install

# Executar testes
composer phpunit
# ou diretamente:
vendor/bin/phpunit

# Lint PSR-2
vendor/bin/phpcs --standard=psr2 src/
vendor/bin/phpcbf --standard=psr2 src/

# Análise estática (nível 7)
vendor/bin/phpstan analyse src/ --level 7
```

## Restrições
- SDK externo (fork) — modificações exigem aprovação explícita
- PHP mínimo: 7.0
- PAF-NFC-e é exigência fiscal do SEFAZ-SC — alterações no layout de registros exigem validação junto à SEFAZ
- Dados de PDV (CNPJ, séries, ECF) nunca em logs
