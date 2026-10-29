<?php

// Functions and constants

namespace {

}
namespace Composer\Autoload {
    if(!function_exists('\\Composer\\Autoload\\includeFile')){
        function includeFile(...$args) {
            return \PGMB\Vendor\Composer\Autoload\includeFile(...func_get_args());
        }
    }
}


namespace PGMB\Vendor {

    use BrianHenryIE\Strauss\Types\AutoloadAliasInterface;

    /**
     * @see AutoloadAliasInterface
     *
     * @phpstan-type ClassAliasArray array{'type':'class',isabstract:bool,classname:string,namespace?:string,extends:string,implements:array<string>}
     * @phpstan-type InterfaceAliasArray array{'type':'interface',interfacename:string,namespace?:string,extends:array<string>}
     * @phpstan-type TraitAliasArray array{'type':'trait',traitname:string,namespace?:string,use:array<string>}
     * @phpstan-type AutoloadAliasArray array<string,ClassAliasArray|InterfaceAliasArray|TraitAliasArray>
     */
    class AliasAutoloader
    {
        private string $includeFilePath;

        /**
         * @var AutoloadAliasArray
         */
        private array $autoloadAliases = array (
  'WP_Async_Request' => 
  array (
    'type' => 'class',
    'classname' => 'WP_Async_Request',
    'isabstract' => true,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_WP_Async_Request',
    'implements' => 
    array (
    ),
  ),
  'WP_Background_Process' => 
  array (
    'type' => 'class',
    'classname' => 'WP_Background_Process',
    'isabstract' => true,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_WP_Background_Process',
    'implements' => 
    array (
    ),
  ),
  'Cron\\AbstractField' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractField',
    'isabstract' => true,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\AbstractField',
    'implements' => 
    array (
      0 => 'Cron\\FieldInterface',
    ),
  ),
  'Cron\\CronExpression' => 
  array (
    'type' => 'class',
    'classname' => 'CronExpression',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\CronExpression',
    'implements' => 
    array (
    ),
  ),
  'Cron\\DayOfMonthField' => 
  array (
    'type' => 'class',
    'classname' => 'DayOfMonthField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\DayOfMonthField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\DayOfWeekField' => 
  array (
    'type' => 'class',
    'classname' => 'DayOfWeekField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\DayOfWeekField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\FieldFactory' => 
  array (
    'type' => 'class',
    'classname' => 'FieldFactory',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\FieldFactory',
    'implements' => 
    array (
    ),
  ),
  'Cron\\HoursField' => 
  array (
    'type' => 'class',
    'classname' => 'HoursField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\HoursField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\MinutesField' => 
  array (
    'type' => 'class',
    'classname' => 'MinutesField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\MinutesField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\MonthField' => 
  array (
    'type' => 'class',
    'classname' => 'MonthField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\MonthField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\YearField' => 
  array (
    'type' => 'class',
    'classname' => 'YearField',
    'isabstract' => false,
    'namespace' => 'Cron',
    'extends' => 'PGMB\\Vendor\\Cron\\YearField',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\AbstractFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\AbstractFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\CronExpressionTest' => 
  array (
    'type' => 'class',
    'classname' => 'CronExpressionTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\CronExpressionTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\DayOfMonthFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'DayOfMonthFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\DayOfMonthFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\DayOfWeekFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'DayOfWeekFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\DayOfWeekFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\FieldFactoryTest' => 
  array (
    'type' => 'class',
    'classname' => 'FieldFactoryTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\FieldFactoryTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\HoursFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'HoursFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\HoursFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\MinutesFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'MinutesFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\MinutesFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\MonthFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'MonthFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\MonthFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Cron\\Tests\\YearFieldTest' => 
  array (
    'type' => 'class',
    'classname' => 'YearFieldTest',
    'isabstract' => false,
    'namespace' => 'Cron\\Tests',
    'extends' => 'PGMB\\Vendor\\Cron\\Tests\\YearFieldTest',
    'implements' => 
    array (
    ),
  ),
  'Firebase\\JWT\\BeforeValidException' => 
  array (
    'type' => 'class',
    'classname' => 'BeforeValidException',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\BeforeValidException',
    'implements' => 
    array (
      0 => 'Firebase\\JWT\\JWTExceptionWithPayloadInterface',
    ),
  ),
  'Firebase\\JWT\\CachedKeySet' => 
  array (
    'type' => 'class',
    'classname' => 'CachedKeySet',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\CachedKeySet',
    'implements' => 
    array (
      0 => 'ArrayAccess',
    ),
  ),
  'Firebase\\JWT\\ExpiredException' => 
  array (
    'type' => 'class',
    'classname' => 'ExpiredException',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\ExpiredException',
    'implements' => 
    array (
      0 => 'Firebase\\JWT\\JWTExceptionWithPayloadInterface',
    ),
  ),
  'Firebase\\JWT\\JWK' => 
  array (
    'type' => 'class',
    'classname' => 'JWK',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\JWK',
    'implements' => 
    array (
    ),
  ),
  'Firebase\\JWT\\JWT' => 
  array (
    'type' => 'class',
    'classname' => 'JWT',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\JWT',
    'implements' => 
    array (
    ),
  ),
  'Firebase\\JWT\\Key' => 
  array (
    'type' => 'class',
    'classname' => 'Key',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\Key',
    'implements' => 
    array (
    ),
  ),
  'Firebase\\JWT\\SignatureInvalidException' => 
  array (
    'type' => 'class',
    'classname' => 'SignatureInvalidException',
    'isabstract' => false,
    'namespace' => 'Firebase\\JWT',
    'extends' => 'PGMB\\Vendor\\Firebase\\JWT\\SignatureInvalidException',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\Html2Text' => 
  array (
    'type' => 'class',
    'classname' => 'Html2Text',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\Html2Text',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\BasicTest' => 
  array (
    'type' => 'class',
    'classname' => 'BasicTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\BasicTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\BlockquoteTest' => 
  array (
    'type' => 'class',
    'classname' => 'BlockquoteTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\BlockquoteTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\ConstructorTest' => 
  array (
    'type' => 'class',
    'classname' => 'ConstructorTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\ConstructorTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\DefinitionListTest' => 
  array (
    'type' => 'class',
    'classname' => 'DefinitionListTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\DefinitionListTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\DelTest' => 
  array (
    'type' => 'class',
    'classname' => 'DelTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\DelTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\HtmlCharsTest' => 
  array (
    'type' => 'class',
    'classname' => 'HtmlCharsTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\HtmlCharsTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\ImageTest' => 
  array (
    'type' => 'class',
    'classname' => 'ImageTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\ImageTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\InsTest' => 
  array (
    'type' => 'class',
    'classname' => 'InsTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\InsTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\LinkTest' => 
  array (
    'type' => 'class',
    'classname' => 'LinkTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\LinkTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\ListTest' => 
  array (
    'type' => 'class',
    'classname' => 'ListTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\ListTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\PreTest' => 
  array (
    'type' => 'class',
    'classname' => 'PreTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\PreTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\PrintTest' => 
  array (
    'type' => 'class',
    'classname' => 'PrintTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\PrintTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\SearchReplaceTest' => 
  array (
    'type' => 'class',
    'classname' => 'SearchReplaceTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\SearchReplaceTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\SpanTest' => 
  array (
    'type' => 'class',
    'classname' => 'SpanTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\SpanTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\StrToUpperTest' => 
  array (
    'type' => 'class',
    'classname' => 'StrToUpperTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\StrToUpperTest',
    'implements' => 
    array (
    ),
  ),
  'Html2Text\\TableTest' => 
  array (
    'type' => 'class',
    'classname' => 'TableTest',
    'isabstract' => false,
    'namespace' => 'Html2Text',
    'extends' => 'PGMB\\Vendor\\Html2Text\\TableTest',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\API' => 
  array (
    'type' => 'class',
    'classname' => 'API',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\API',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Data\\Account' => 
  array (
    'type' => 'class',
    'classname' => 'Account',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Data',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Data\\Account',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Data\\Group' => 
  array (
    'type' => 'class',
    'classname' => 'Group',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Data',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Data\\Group',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Data\\Location' => 
  array (
    'type' => 'class',
    'classname' => 'Location',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Data',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Data\\Location',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Data\\Product' => 
  array (
    'type' => 'class',
    'classname' => 'Product',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Data',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Data\\Product',
    'implements' => 
    array (
      0 => 'JsonSerializable',
    ),
  ),
  'Koen12344\\GbpProductApi\\Exceptions\\CookiesExpiredException' => 
  array (
    'type' => 'class',
    'classname' => 'CookiesExpiredException',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Exceptions',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Exceptions\\CookiesExpiredException',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Exceptions\\MerchantCenterException' => 
  array (
    'type' => 'class',
    'classname' => 'MerchantCenterException',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Exceptions',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Exceptions\\MerchantCenterException',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Exceptions\\RateLimitException' => 
  array (
    'type' => 'class',
    'classname' => 'RateLimitException',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Exceptions',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Exceptions\\RateLimitException',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Exceptions\\UnknownEntityException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownEntityException',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi\\Exceptions',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Exceptions\\UnknownEntityException',
    'implements' => 
    array (
    ),
  ),
  'Koen12344\\GbpProductApi\\Translator' => 
  array (
    'type' => 'class',
    'classname' => 'Translator',
    'isabstract' => false,
    'namespace' => 'Koen12344\\GbpProductApi',
    'extends' => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\Translator',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Autoload\\ClassLoader' => 
  array (
    'type' => 'class',
    'classname' => 'ClassLoader',
    'isabstract' => false,
    'namespace' => 'Composer\\Autoload',
    'extends' => 'PGMB\\Vendor\\Composer\\Autoload\\ClassLoader',
    'implements' => 
    array (
    ),
  ),
  'Composer\\Autoload\\ComposerStaticInita0d97139d2bfa713b961ccf79c359687' => 
  array (
    'type' => 'class',
    'classname' => 'ComposerStaticInita0d97139d2bfa713b961ccf79c359687',
    'isabstract' => false,
    'namespace' => 'Composer\\Autoload',
    'extends' => 'PGMB\\Vendor\\Composer\\Autoload\\ComposerStaticInita0d97139d2bfa713b961ccf79c359687',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Cache\\AbstractCache' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractCache',
    'isabstract' => true,
    'namespace' => 'Mustache\\Cache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Cache\\AbstractCache',
    'implements' => 
    array (
      0 => 'Mustache\\Cache',
    ),
  ),
  'Mustache\\Cache\\FilesystemCache' => 
  array (
    'type' => 'class',
    'classname' => 'FilesystemCache',
    'isabstract' => false,
    'namespace' => 'Mustache\\Cache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Cache\\FilesystemCache',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Cache\\NoopCache' => 
  array (
    'type' => 'class',
    'classname' => 'NoopCache',
    'isabstract' => false,
    'namespace' => 'Mustache\\Cache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Cache\\NoopCache',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\CompileOptions' => 
  array (
    'type' => 'class',
    'classname' => 'CompileOptions',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\CompileOptions',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Compiler' => 
  array (
    'type' => 'class',
    'classname' => 'Compiler',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Compiler',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Context' => 
  array (
    'type' => 'class',
    'classname' => 'Context',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Context',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Engine' => 
  array (
    'type' => 'class',
    'classname' => 'Engine',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Engine',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Exception\\InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'InvalidArgumentException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\InvalidArgumentException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'LogicException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\LogicException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\RenderingException' => 
  array (
    'type' => 'class',
    'classname' => 'RenderingException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\RenderingException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'RuntimeException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\RuntimeException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\SyntaxException' => 
  array (
    'type' => 'class',
    'classname' => 'SyntaxException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\SyntaxException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\UnknownBlockException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownBlockException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\UnknownBlockException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\UnknownFilterException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownFilterException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\UnknownFilterException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\UnknownHelperException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownHelperException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\UnknownHelperException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\UnknownTemplateException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownTemplateException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\UnknownTemplateException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\Exception\\UnknownVariableException' => 
  array (
    'type' => 'class',
    'classname' => 'UnknownVariableException',
    'isabstract' => false,
    'namespace' => 'Mustache\\Exception',
    'extends' => 'PGMB\\Vendor\\Mustache\\Exception\\UnknownVariableException',
    'implements' => 
    array (
      0 => 'Mustache\\Exception',
    ),
  ),
  'Mustache\\HelperCollection' => 
  array (
    'type' => 'class',
    'classname' => 'HelperCollection',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\HelperCollection',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\LambdaHelper' => 
  array (
    'type' => 'class',
    'classname' => 'LambdaHelper',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\LambdaHelper',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Loader\\ArrayLoader' => 
  array (
    'type' => 'class',
    'classname' => 'ArrayLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\ArrayLoader',
    'implements' => 
    array (
      0 => 'Mustache\\Loader',
      1 => 'Mustache\\Loader\\MutableLoader',
    ),
  ),
  'Mustache\\Loader\\CascadingLoader' => 
  array (
    'type' => 'class',
    'classname' => 'CascadingLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\CascadingLoader',
    'implements' => 
    array (
      0 => 'Mustache\\Loader',
    ),
  ),
  'Mustache\\Loader\\FilesystemLoader' => 
  array (
    'type' => 'class',
    'classname' => 'FilesystemLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\FilesystemLoader',
    'implements' => 
    array (
      0 => 'Mustache\\Loader',
    ),
  ),
  'Mustache\\Loader\\InlineLoader' => 
  array (
    'type' => 'class',
    'classname' => 'InlineLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\InlineLoader',
    'implements' => 
    array (
      0 => 'Mustache\\Loader',
    ),
  ),
  'Mustache\\Loader\\ProductionFilesystemLoader' => 
  array (
    'type' => 'class',
    'classname' => 'ProductionFilesystemLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\ProductionFilesystemLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Loader\\StringLoader' => 
  array (
    'type' => 'class',
    'classname' => 'StringLoader',
    'isabstract' => false,
    'namespace' => 'Mustache\\Loader',
    'extends' => 'PGMB\\Vendor\\Mustache\\Loader\\StringLoader',
    'implements' => 
    array (
      0 => 'Mustache\\Loader',
    ),
  ),
  'Mustache\\Logger\\AbstractLogger' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractLogger',
    'isabstract' => true,
    'namespace' => 'Mustache\\Logger',
    'extends' => 'PGMB\\Vendor\\Mustache\\Logger\\AbstractLogger',
    'implements' => 
    array (
      0 => 'Mustache\\Logger',
    ),
  ),
  'Mustache\\Logger\\StreamLogger' => 
  array (
    'type' => 'class',
    'classname' => 'StreamLogger',
    'isabstract' => false,
    'namespace' => 'Mustache\\Logger',
    'extends' => 'PGMB\\Vendor\\Mustache\\Logger\\StreamLogger',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Parser' => 
  array (
    'type' => 'class',
    'classname' => 'Parser',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Parser',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\RenderedString' => 
  array (
    'type' => 'class',
    'classname' => 'RenderedString',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\RenderedString',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Source\\FilesystemSource' => 
  array (
    'type' => 'class',
    'classname' => 'FilesystemSource',
    'isabstract' => false,
    'namespace' => 'Mustache\\Source',
    'extends' => 'PGMB\\Vendor\\Mustache\\Source\\FilesystemSource',
    'implements' => 
    array (
      0 => 'Mustache\\Source',
    ),
  ),
  'Mustache\\Template' => 
  array (
    'type' => 'class',
    'classname' => 'Template',
    'isabstract' => true,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Template',
    'implements' => 
    array (
    ),
  ),
  'Mustache\\Tokenizer' => 
  array (
    'type' => 'class',
    'classname' => 'Tokenizer',
    'isabstract' => false,
    'namespace' => 'Mustache',
    'extends' => 'PGMB\\Vendor\\Mustache\\Tokenizer',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Engine' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Engine',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Engine',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Cache_AbstractCache' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Cache_AbstractCache',
    'isabstract' => true,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Cache_AbstractCache',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Cache_FilesystemCache' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Cache_FilesystemCache',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Cache_FilesystemCache',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Cache_NoopCache' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Cache_NoopCache',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Cache_NoopCache',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Compiler' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Compiler',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Compiler',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Context' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Context',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Context',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_InvalidArgumentException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_InvalidArgumentException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_InvalidArgumentException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_LogicException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_LogicException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_LogicException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_RuntimeException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_RuntimeException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_RuntimeException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_RenderingException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_RenderingException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_RenderingException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_SyntaxException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_SyntaxException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_SyntaxException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_UnknownBlockException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_UnknownBlockException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_UnknownBlockException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_UnknownFilterException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_UnknownFilterException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_UnknownFilterException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_UnknownHelperException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_UnknownHelperException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_UnknownHelperException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_UnknownTemplateException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_UnknownTemplateException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_UnknownTemplateException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Exception_UnknownVariableException' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Exception_UnknownVariableException',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Exception_UnknownVariableException',
    'implements' => 
    array (
    ),
  ),
  'Mustache_HelperCollection' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_HelperCollection',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_HelperCollection',
    'implements' => 
    array (
    ),
  ),
  'Mustache_LambdaHelper' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_LambdaHelper',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_LambdaHelper',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_ArrayLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_ArrayLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_ArrayLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_CascadingLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_CascadingLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_CascadingLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_FilesystemLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_FilesystemLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_FilesystemLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_InlineLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_InlineLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_InlineLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_ProductionFilesystemLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_ProductionFilesystemLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_ProductionFilesystemLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Loader_StringLoader' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Loader_StringLoader',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Loader_StringLoader',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Logger_AbstractLogger' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Logger_AbstractLogger',
    'isabstract' => true,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Logger_AbstractLogger',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Logger_StreamLogger' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Logger_StreamLogger',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Logger_StreamLogger',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Parser' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Parser',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Parser',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Source_FilesystemSource' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Source_FilesystemSource',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Source_FilesystemSource',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Template' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Template',
    'isabstract' => true,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Template',
    'implements' => 
    array (
    ),
  ),
  'Mustache_Tokenizer' => 
  array (
    'type' => 'class',
    'classname' => 'Mustache_Tokenizer',
    'isabstract' => false,
    'namespace' => '\\',
    'extends' => 'PGMB_Vendor_Mustache_Tokenizer',
    'implements' => 
    array (
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTime' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTime',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTime',
    'implements' => 
    array (
      0 => 'Rarst\\WordPress\\DateTime\\WpDateTimeInterface',
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeImmutable' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeImmutable',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeImmutable',
    'implements' => 
    array (
      0 => 'Rarst\\WordPress\\DateTime\\WpDateTimeInterface',
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeZone' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeZone',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeZone',
    'implements' => 
    array (
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeImmutableTest' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeImmutableTest',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeImmutableTest',
    'implements' => 
    array (
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeTest' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeTest',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeTest',
    'implements' => 
    array (
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeTestCase' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeTestCase',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeTestCase',
    'implements' => 
    array (
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeZoneTest' => 
  array (
    'type' => 'class',
    'classname' => 'WpDateTimeZoneTest',
    'isabstract' => false,
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeZoneTest',
    'implements' => 
    array (
    ),
  ),
  'TypistTech\\WPAdminNotices\\AbstractNotice' => 
  array (
    'type' => 'class',
    'classname' => 'AbstractNotice',
    'isabstract' => true,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\AbstractNotice',
    'implements' => 
    array (
      0 => 'TypistTech\\WPAdminNotices\\NoticeInterface',
    ),
  ),
  'TypistTech\\WPAdminNotices\\Factory' => 
  array (
    'type' => 'class',
    'classname' => 'Factory',
    'isabstract' => false,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\Factory',
    'implements' => 
    array (
    ),
  ),
  'TypistTech\\WPAdminNotices\\Notice' => 
  array (
    'type' => 'class',
    'classname' => 'Notice',
    'isabstract' => false,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\Notice',
    'implements' => 
    array (
    ),
  ),
  'TypistTech\\WPAdminNotices\\Notifier' => 
  array (
    'type' => 'class',
    'classname' => 'Notifier',
    'isabstract' => false,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\Notifier',
    'implements' => 
    array (
    ),
  ),
  'TypistTech\\WPAdminNotices\\StickyNotice' => 
  array (
    'type' => 'class',
    'classname' => 'StickyNotice',
    'isabstract' => false,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\StickyNotice',
    'implements' => 
    array (
    ),
  ),
  'TypistTech\\WPAdminNotices\\Store' => 
  array (
    'type' => 'class',
    'classname' => 'Store',
    'isabstract' => false,
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\Store',
    'implements' => 
    array (
      0 => 'TypistTech\\WPAdminNotices\\StoreInterface',
    ),
  ),
  'Mustache\\Cache' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Cache',
    'namespace' => 'Mustache',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Cache',
    ),
  ),
  'Mustache\\Exception' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Exception',
    'namespace' => 'Mustache',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Exception',
    ),
  ),
  'Mustache\\Loader' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Loader',
    'namespace' => 'Mustache',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Loader',
    ),
  ),
  'Mustache\\Logger' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Logger',
    'namespace' => 'Mustache',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Logger',
    ),
  ),
  'Mustache\\Source' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Source',
    'namespace' => 'Mustache',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Source',
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeTrait' => 
  array (
    'type' => 'trait',
    'traitname' => 'WpDateTimeTrait',
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'use' => 
    array (
      0 => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeTrait',
    ),
  ),
  'Cron\\FieldInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'FieldInterface',
    'namespace' => 'Cron',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Cron\\FieldInterface',
    ),
  ),
  'Firebase\\JWT\\JWTExceptionWithPayloadInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'JWTExceptionWithPayloadInterface',
    'namespace' => 'Firebase\\JWT',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Firebase\\JWT\\JWTExceptionWithPayloadInterface',
    ),
  ),
  'Koen12344\\GbpProductApi\\CookieStorageInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'CookieStorageInterface',
    'namespace' => 'Koen12344\\GbpProductApi',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Koen12344\\GbpProductApi\\CookieStorageInterface',
    ),
  ),
  'Mustache\\Loader\\MutableLoader' => 
  array (
    'type' => 'interface',
    'interfacename' => 'MutableLoader',
    'namespace' => 'Mustache\\Loader',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Mustache\\Loader\\MutableLoader',
    ),
  ),
  'Mustache_Cache' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Cache',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Cache',
    ),
  ),
  'Mustache_Exception' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Exception',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Exception',
    ),
  ),
  'Mustache_Loader' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Loader',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Loader',
    ),
  ),
  'Mustache_Loader_MutableLoader' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Loader_MutableLoader',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Loader_MutableLoader',
    ),
  ),
  'Mustache_Logger' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Logger',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Logger',
    ),
  ),
  'Mustache_Source' => 
  array (
    'type' => 'interface',
    'interfacename' => 'Mustache_Source',
    'namespace' => '\\',
    'extends' => 
    array (
      0 => 'PGMB_Vendor_Mustache_Source',
    ),
  ),
  'Rarst\\WordPress\\DateTime\\WpDateTimeInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'WpDateTimeInterface',
    'namespace' => 'Rarst\\WordPress\\DateTime',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\Rarst\\WordPress\\DateTime\\WpDateTimeInterface',
    ),
  ),
  'TypistTech\\WPAdminNotices\\NoticeInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'NoticeInterface',
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\NoticeInterface',
    ),
  ),
  'TypistTech\\WPAdminNotices\\StoreInterface' => 
  array (
    'type' => 'interface',
    'interfacename' => 'StoreInterface',
    'namespace' => 'TypistTech\\WPAdminNotices',
    'extends' => 
    array (
      0 => 'PGMB\\Vendor\\TypistTech\\WPAdminNotices\\StoreInterface',
    ),
  ),
);

        public function __construct()
        {
            $this->includeFilePath = __DIR__ . '/autoload_alias.php';
        }

        /**
         * @param string $class
         */
        public function autoload($class): void
        {
            if (!isset($this->autoloadAliases[$class])) {
                return;
            }
            switch ($this->autoloadAliases[$class]['type']) {
                case 'class':
                        $this->load(
                            $this->classTemplate(
                                $this->autoloadAliases[$class]
                            )
                        );
                    break;
                case 'interface':
                    $this->load(
                        $this->interfaceTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                case 'trait':
                    $this->load(
                        $this->traitTemplate(
                            $this->autoloadAliases[$class]
                        )
                    );
                    break;
                default:
                    // Never.
                    break;
            }
        }

        private function load(string $includeFile): void
        {
            file_put_contents($this->includeFilePath, $includeFile);
            include $this->includeFilePath;
            file_exists($this->includeFilePath) && unlink($this->includeFilePath);
        }

        /**
         * @param ClassAliasArray $class
         */
        private function classTemplate(array $class): string
        {
            $abstract = $class['isabstract'] ? 'abstract ' : '';
            $classname = $class['classname'];
            if (isset($class['namespace'])) {
                $namespace = "namespace {$class['namespace']};";
                $extends = '\\' . $class['extends'];
                $implements = empty($class['implements']) ? ''
                : ' implements \\' . implode(', \\', $class['implements']);
            } else {
                $namespace = '';
                $extends = $class['extends'];
                $implements = !empty($class['implements']) ? ''
                : ' implements ' . implode(', ', $class['implements']);
            }
            return <<<EOD
                <?php
                $namespace
                $abstract class $classname extends $extends $implements {}
                EOD;
        }

        /**
         * @param InterfaceAliasArray $interface
         */
        private function interfaceTemplate(array $interface): string
        {
            $interfacename = $interface['interfacename'];
            $namespace = isset($interface['namespace'])
            ? "namespace {$interface['namespace']};" : '';
            $extends = isset($interface['namespace'])
            ? '\\' . implode('\\ ,', $interface['extends'])
            : implode(', ', $interface['extends']);
            return <<<EOD
                <?php
                $namespace
                interface $interfacename extends $extends {}
                EOD;
        }

        /**
         * @param TraitAliasArray $trait
         */
        private function traitTemplate(array $trait): string
        {
            $traitname = $trait['traitname'];
            $namespace = isset($trait['namespace'])
            ? "namespace {$trait['namespace']};" : '';
            $uses = isset($trait['namespace'])
            ? '\\' . implode(';' . PHP_EOL . '    use \\', $trait['use'])
            : implode(';' . PHP_EOL . '    use ', $trait['use']);
            return <<<EOD
                <?php
                $namespace
                trait $traitname { 
                    use $uses; 
                }
                EOD;
        }
    }

    spl_autoload_register([ new AliasAutoloader(), 'autoload' ]);
}
