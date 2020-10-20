<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdbddaa68b38e2c24886c7564adfa36aa
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
    );

    public static $classMap = array (
        'CatapultApiException' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Exception.php',
        'CatapultApiWarning' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Exception.php',
        'Catapult\\API' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\API_MODE' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\Account' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Account.php',
        'Catapult\\AnswerCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/CallAnswerEvent.php',
        'Catapult\\Application' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Application.php',
        'Catapult\\ApplicationCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\AudioMixin' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Misc.php',
        'Catapult\\BAML_SETTINGS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\BAML_VERBS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\BAML_XML_HANDLERS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\BAML_XML_METHODS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\BAML_XML_OPTIONS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\BaML' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaML.php',
        'Catapult\\BaMLAssert' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLAssert.php',
        'Catapult\\BaMLAttribute' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLAttribute.php',
        'Catapult\\BaMLContainer' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLContainer.php',
        'Catapult\\BaMLGather' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLGeneric' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLBase.php',
        'Catapult\\BaMLHangup' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLPlayAudio' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLRedirect' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaML.php',
        'Catapult\\BaMLSendMessage' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLSpeakSentence' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLText' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLText.php',
        'Catapult\\BaMLTransfer' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerb' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerb.php',
        'Catapult\\BaMLVerbGather' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbHangup' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbPlayAudio' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbRecord' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbRedirect' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbSendMessage' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbSpeakSentence' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaMLVerbTransfer' => __DIR__ . '/..' . '/bandwidth/catapult/source/baml/BaMLVerbExt.php',
        'Catapult\\BaseResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Base.php',
        'Catapult\\BaseUtilities' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Base.php',
        'Catapult\\Bridge' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Bridge.php',
        'Catapult\\BridgeCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\CALL_ERROR' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\CALL_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\CONFERENCE_MEMBER_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\CONFERENCE_SPEAK_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\CONFERENCE_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\Call' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Call.php',
        'Catapult\\CallCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\CallCombo' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/CallCombo.php',
        'Catapult\\CallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/CallEvent.php',
        'Catapult\\CallEvents' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/CallEvents.php',
        'Catapult\\CallEventsCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\Callback' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Callback.php',
        'Catapult\\Cleaner' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Cleaner.php',
        'Catapult\\Client' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Client.php',
        'Catapult\\ClientResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\CollectionIterator' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Collections.php',
        'Catapult\\CollectionObject' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Collections.php',
        'Catapult\\CollectionSequence' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Collections.php',
        'Catapult\\Conference' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Conference.php',
        'Catapult\\ConferenceEventMixin' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/ConferenceEvent.php',
        'Catapult\\ConferenceMember' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/ConferenceMember.php',
        'Catapult\\ConferenceMemberEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/ConferenceMemberEvent.php',
        'Catapult\\ConferencePlaybackEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/ConferencePlaybackEvent.php',
        'Catapult\\Constructor' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Constructor.php',
        'Catapult\\Converter' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Converter.php',
        'Catapult\\Credentials' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Credentials.php',
        'Catapult\\CredentialsUser' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Credentials.php',
        'Catapult\\DEFAULTS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\DTMF' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Dtmf.php',
        'Catapult\\DataPacket' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Collections.php',
        'Catapult\\DataPacketCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Collections.php',
        'Catapult\\Date' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Date.php',
        'Catapult\\DependsObject' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\DependsResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\Domains' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Domains.php',
        'Catapult\\DomainsCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\DtmfCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/DtmfCallEvent.php',
        'Catapult\\EXCEPTIONS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\Endpoints' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Endpoints.php',
        'Catapult\\EndpointsCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\EndpointsCredentials' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/EndpointsCredentials.php',
        'Catapult\\EndpointsMulti' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/EndpointsMulti.php',
        'Catapult\\EndpointsToken' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/EndpointsToken.php',
        'Catapult\\Ensure' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Ensure.php',
        'Catapult\\EnsureResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Ensure.php',
        'Catapult\\ErrorCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/ErrorCallEvent.php',
        'Catapult\\Event' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/Base.php',
        'Catapult\\EventAssert' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/Base.php',
        'Catapult\\EventCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\EventResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Event.php',
        'Catapult\\EventType' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/Base.php',
        'Catapult\\FileHandler' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/FileHandler.php',
        'Catapult\\GATHER_REASONS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\GATHER_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\Gather' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Gather.php',
        'Catapult\\GatherCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/GatherEvent.php',
        'Catapult\\GatherCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\GenericResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Base.php',
        'Catapult\\HangupCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/HangupCallEvent.php',
        'Catapult\\Id' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Id.php',
        'Catapult\\IncomingCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/IncomingCallEvent.php',
        'Catapult\\LoadsResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Loads.php',
        'Catapult\\Locator' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Locator.php',
        'Catapult\\Log' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Log.php',
        'Catapult\\MESSAGE_DIRECTIONS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\MESSAGE_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\Media' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Media.php',
        'Catapult\\MediaCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\MediaURL' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/MediaURL.php',
        'Catapult\\Message' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Message.php',
        'Catapult\\MessageCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\MessageEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/MessageEvent.php',
        'Catapult\\MessageMulti' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/MessageMulti.php',
        'Catapult\\MetaResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\Multi' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\NUMBER_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\NumberInfo' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/NumberInfo.php',
        'Catapult\\PATHS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\PLAYBACK_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\Page' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Page.php',
        'Catapult\\Parameters' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Parameters.php',
        'Catapult\\PathResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Path.php',
        'Catapult\\PhoneCombo' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/PhoneCombo.php',
        'Catapult\\PhoneNumber' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/PhoneNumber.php',
        'Catapult\\PhoneNumbers' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/PhoneNumbers.php',
        'Catapult\\PhoneNumbersCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\PlaybackCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/PlaybackCallEvent.php',
        'Catapult\\PrototypeUtility' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Prototype.php',
        'Catapult\\RECORDING_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\RECORDING_STATUSES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\RESTClient' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Client.php',
        'Catapult\\Recording' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Recording.php',
        'Catapult\\RecordingCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/RecordingCallEvent.php',
        'Catapult\\RecordingCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\RejectCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/RejectCallEvent.php',
        'Catapult\\RemoveResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\Resolver' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Resolver.php',
        'Catapult\\ResolverResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Resolver.php',
        'Catapult\\SIP' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/SIP.php',
        'Catapult\\SIPRealm' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/SIPRealm.php',
        'Catapult\\SPEAK_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\SchemaResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Schema.php',
        'Catapult\\Sentence' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Sentence.php',
        'Catapult\\Size' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Size.php',
        'Catapult\\SpeakCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/SpeakCallEvent.php',
        'Catapult\\StringifyResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Uri.php',
        'Catapult\\SubFunctionResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\SubfunctionObject' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Helpers.php',
        'Catapult\\TRANSCRIPTION_STATES' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/States.php',
        'Catapult\\TextMessage' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/TextMessage.php',
        'Catapult\\Timeout' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Timeout.php',
        'Catapult\\TimeoutCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/TimeoutCallEvent.php',
        'Catapult\\TitleUtility' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/Title.php',
        'Catapult\\Transaction' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Transaction.php',
        'Catapult\\TransactionCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\Transcription' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Transcription.php',
        'Catapult\\TranscriptionCallEvent' => __DIR__ . '/..' . '/bandwidth/catapult/source/events/TranscriptionEvent.php',
        'Catapult\\TranscriptionCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\Types' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Base.php',
        'Catapult\\URIResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Uri.php',
        'Catapult\\UserError' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/UserError.php',
        'Catapult\\UserErrorCollection' => __DIR__ . '/..' . '/bandwidth/catapult/source/models/Plural.php',
        'Catapult\\VerifyResource' => __DIR__ . '/..' . '/bandwidth/catapult/source/resource/Verify.php',
        'Catapult\\Voice' => __DIR__ . '/..' . '/bandwidth/catapult/source/types/Voice.php',
        'Catapult\\WARNINGS' => __DIR__ . '/..' . '/bandwidth/catapult/source/core/Constants.php',
        'Catapult\\XMLUtility' => __DIR__ . '/..' . '/bandwidth/catapult/source/utils/XML.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdbddaa68b38e2c24886c7564adfa36aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdbddaa68b38e2c24886c7564adfa36aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdbddaa68b38e2c24886c7564adfa36aa::$classMap;

        }, null, ClassLoader::class);
    }
}
