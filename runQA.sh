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
