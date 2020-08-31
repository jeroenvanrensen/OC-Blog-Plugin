<?php

return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'Een uitgebreide blog plugin',
        'navigation' => [
            'new_post' => 'Nieuw bericht',
            'all_posts' => 'Alle berichten',
            'categories' => 'Categorieën',
        ]
    ],
    'components' => [
        'blogpost' => [
            'html' => [
                'posted' => 'Geplaatst',
                'on_date' => 'op',
                'date_format' => 'F jS Y',
                'at_time' => 'om',
                'time_format' => 'H:i:s',
                'by_author' => 'door',
                'in_category' => 'in',
                'tags' => 'Tags'
            ],
            'php' => [
                'component_name' => 'Enkel bericht',
                'component_description' => 'Toont een enkel bericht',
                'options' => [
                    'format_title' => 'Type',
                    'format_description' => 'Als je niet weet wat dit betekent, wordt het afgeraden om het te veranderen.'
                ]
            ]
        ],
        'blogposts' => [
            'html' => [
                'posted' => 'Geplaatst',
                'on_date' => 'op',
                'date_format' => 'F jS Y',
                'at_time' => 'om',
                'time_format' => 'H:i:s',
                'by_author' => 'door',
                'in_category' => 'in',
                'no_posts_found' => 'Geen berichten gevonden.'
            ],
            'php' => [
                'component_name' => 'Lijst met berichten',
                'component_description' => 'Toont een lijst met berichten',
                'options' => [
                    'postorder_title' => 'Volgorde',
                    'postorder_title_asc' => 'Titel (a-z)',
                    'postorder_title_desc' => 'Titel (z-a)',
                    'postorder_created_asc' => 'Gemaakt (a-z)',
                    'postorder_created_desc' => 'Gemaakt (z-a)',
                    'postorder_updated_asc' => 'Geüpdated (a-z)',
                    'postorder_updated_desc' => 'Geüpdated (z-a)',
                    'postorder_published_asc' => 'Gepubliceerd (a-z)',
                    'postorder_published_desc' => 'Gepubliceerd (z-a)',

                    'postpage_title' => 'Bericht pagina',

                    'categoryfilter_title' => 'Categorie filter',
                    'categoryfilter_description' => 'Geef een onderdeel van de url voor het categorie filter. Als het leeg is worden alle berichten getoond.',
                    'categoryfilter_validationmessage' => 'Je mag alleen kleine letters (a-z) of een dubbele punt (:) gebruiken of het leeg laten.',

                    'tagfilter_title' => 'Tag filter',
                    'tagfilter_description' => 'Geef een onderdeel van de url voor het tag filter. Als het leeg is worden alle berichten getoond.',
                    'tagfilter_validationmessage' => 'Je mag alleen kleine letters (a-z) of een dubbele punt (:) gebruiken of het leeg laten.',

                    'format_title' => 'Type',
                    'format_description' => 'Als je niet weet wat dit betekent, wordt het afgeraden om het te veranderen.'
                ]
            ]
        ]
    ],
    'controllers' => [
        'categories' => [
            'html' => [
                'new_category' => 'Nieuwe categorie',
                'delete_list_confirmation' => 'Weet je zeker dat je de geselecteerde categorieën wilt verwijderen?',
                'delete_list' => 'Geselecteerde verwijderen',
                'categories' => 'Categorieën',
                'creating_category' => 'Categorie maken...',
                'create' => 'Maak',
                'create_and_close' => 'Maken & Sluiten',
                'or' => 'of',
                'cancel' => 'Annuleren',
                'return_to_list' => 'Ga terug naar de categorieënlijst',
                'saving_category' => 'Categorie opslaan...',
                'save' => 'Opslaan',
                'save_and_close' => 'Opslaan & Sluiten',
                'deleting_category' => 'Categorie verwijderen...',
                'delete_confirmation' => 'Verwijder deze categorie?'
            ],
            'yaml' => [
                'category' => 'Categorie',
                'categories' => 'Categorieën',
                'create_category' => 'Categorie maken',
                'update_category' => 'Categorie bewerken',
                'no_categories_found' => 'Geen categorieën gevonden.',
                'search' => 'Zoeken...'
            ]
        ],
        'posts' => [
            'html' => [
                'new_post' => 'Nieuw bericht',
                'delete_list_confirmation' => 'Weet je zeker dat je de geselecteerde berichten wilt verwijderen?',
                'delete_list' => 'Geselecteerde verwijderen',
                'posts' => 'Berichten',
                'creating_post' => 'Bericht maken...',
                'create' => 'Maken',
                'create_and_close' => 'Maken & Sluiten',
                'or' => 'of',
                'cancel' => 'Annuleren',
                'return_to_list' => 'Ga terug naar de berichtenlijst',
                'saving_post' => 'Bericht opslaan...',
                'save' => 'Opslaan',
                'save_and_close' => 'Opslaan & Sluiten',
                'deleting' => 'Bericht verwijderen...',
                'delete_confirmation' => 'Verwijder dit bericht?'
            ],
            'yaml' => [
                'category' => 'Categorie',
                'publish_date' => 'Publiceerdatum',
                'published' => 'Gepubliceerd',
                'post' => 'Bericht',
                'posts' => 'Berichten',
                'create_post' => 'Bericht maken',
                'update_post' => 'Bericht bewerken',
                'no_posts_found' => 'Geen berichten gevonden.',
                'search' => 'Zoeken...'
            ]
        ]
    ],
    'models' => [
        'category' => [
            'columns' => [
                'name' => 'Naam',
                'description' => 'Beschrijving'
            ],
            'fields' => [
                'name' => 'Naam',
                'slug' => 'Slug',
                'description' => 'Beschrijving'
            ]
        ],
        'post' => [
            'columns' => [
                'title' => 'Titel',
                'body' => 'Inhoud',
                'category' => 'Categorie',
                'published' => 'Gepubliceerd'
            ],
            'fields' => [
                'title' => 'Titel',
                'slug' => 'Slug',
                'edit' => 'Bewerken',
                'body' => 'Inhoud',
                'properties' => 'Eigenschappen',
                'publish' => 'Publiceerdatum',
                'publish_comment' => 'Laat dit leeg voor geen publiceerdatum.',
                'featured_image' => 'Uitgelichte afbeelding',
                'author' => 'Auteur',
                'category' => 'Categorie',
                'excerpt' => 'Samenvatting',
                'tags' => 'Tags'
            ]
        ]
    ]
];
