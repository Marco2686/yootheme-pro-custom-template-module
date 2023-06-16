<?php
// File: TemplateMatch.php

namespace MyNamespace\Listener;
use YOOtheme\Config;


class TemplateMatch
{   


    public static function matchTemplate($tpl)
    {   
        
        global $post;

        $object = get_queried_object();

        global $wp_query;

        
        $pages = get_query_var('paged') && get_query_var('paged') !== 1 ? 'except_first' : 'first';
        
        // match context and layout from view object
        // change here your custom match rule, in this case i'm matching a taxonomy and checking the query vars match to my desidered values
            if(is_tax() && ($wp_query->query['tipologia'] != '' && isset($wp_query->query['marchio']))){

            return [
                'type' => "my_custom_content",
                'query' => [
                    'terms' => $object->term_id,
                    'terms_filter' => static::getTaxonomyTermsFilterFn(),
                    'pages' => $pages,
                    // 'locale' => $locale,
                ],
            ];
        }
    }

    protected static function getTaxonomyTermsFilterFn(): \Closure
    {
        return function ($terms) {
            global $wp_query;

            if (empty($wp_query->tax_query->queried_terms)) {
                return false;
            }

            foreach ($terms as $id) {
                $term = get_term($id);

                if (!$term) {
                    continue;
                }

                $queried = $wp_query->tax_query->queried_terms[$term->taxonomy] ?? null;
                foreach ($queried['terms'] ?? [] as $t) {
                    $t = get_term_by($queried['field'], $t, $term->taxonomy);

                    if ($t && $t->term_id === $term->term_id) {
                        return true;
                    }
                }
            }
            return false;
        };
    }
    

}
