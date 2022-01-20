#!/bin/bash
zcat /tmp/dump.sql.gz | mysql -uroki -proki roki
echo success;
