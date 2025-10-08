<?php

    namespace Module\PanelBooks\Queries;

    use Papyrus\Database\Query;

    class InsertBook extends Query {
        public function sql() {
            return <<<SQL
                INSERT INTO books 
                    (title, description, slug, tags, banner, metadata)
                VALUES
                    (:title, :description, :slug, :tags, :banner, :metadata)
            SQL;
        }
    }
