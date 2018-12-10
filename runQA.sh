
echo "======================================================================"
echo "                         ___              _ _ _"
echo "                        / _ \\ _   _  __ _| (_) |_ _   _ "
echo "                       | | | | | | |/ _\` | | | __| | | |"
echo "                       | |_| | |_| | (_| | | | |_| |_| |"
echo "                        \\__\\_\\\\__,_|\\__,_|_|_|\\__|\\__, |"
echo "                                                  |___/ "
echo "                    _                                    "
echo "                   / \\   ___ ___ _   _ _ __ __ _ _ __   ___ ___"
echo "                  / _ \\ / __/ __| | | | \__/ _\` | \_ \\ / __/ _ \\"
echo "                 / ___ \\\\__ \\__ \\ |_| | | | (_| | | | | (_|  __/"
echo "                /_/   \\_\\___/___/\\__,_|_|  \\__,_|_| |_|\\___\\___|"
echo "======================================================================"

echo "=> PREPARE ENVIRONNEMEBT & LOAD FIXTURES"

bin/console c:c --env=test

bin/console d:s:d -f
bin/console d:s:c
bin/console d:f:l -n


echo "-----------------------------------------------------"
echo " "
echo " => run UNIT TEST"
echo " "

vendor/phpunit/phpunit/phpunit --configuration phpunit.xml.dist

echo "-----------------------------------------------------"
echo " "
echo " => run CODE STYLE TEST"
echo " "

vendor/bin/php-cs-fixer fix -v --diff --dry-run src/

echo "-----------------------------------------------------"
echo " "
echo " => run MESS DETECTOR"
echo " "

vendor/bin/phpmd src/ text custom-phpmd-ruleset

echo "-----------------------------------------------------"
echo " "
echo " => run COPY PASTE DETECTOR"
echo " "
vendor/bin/phpcpd src/

echo "-----------------------------------------------------"

echo "QA DONE."
