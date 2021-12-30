pipeline {
    agent any
    stages {

        stage('build') {
            steps {
                echo "Running ${env.BUILD_ID} ${env.BUILD_DISPLAY_NAME} on ${env.NODE_NAME} and JOB ${env.JOB_NAME}"
                echo pwd()
                dir('C:/xampp/htdocs/Tatleon') { 
                    bat "composer update"
                }
            }
        }


        stage('analysis')
        {
            steps{
                dir ('C:/sonarqube/bin/windows-x86-64'){
                    bat "StartSonar.bat"
                }
                dir('C:/xampp/htdocs/Tatleon') { 
                    bat 'sonar-scanner.bat -D"sonar.projectKey=TatleonWeb" -D"sonar.sources=." -D"sonar.host.url=http://localhost:9000" -D"sonar.login=2d3ee2a973f3a1abfcfd5f2743b43d18d5c843f6"'
                }
            }
        }


        stage('unit test') {
            steps {
                echo "Running ${env.BUILD_ID} ${env.BUILD_DISPLAY_NAME} on ${env.NODE_NAME} and JOB ${env.JOB_NAME}"
                echo pwd()
                dir('C:/xampp/htdocs/Tatleon/tests') { 
                    // userGetAttributeTest and get result of tester.py
                    bat "phpunit userGetAttributeTest.php > temp.txt"
                    bat "python tester.py"
                    // headerTest and get result of tester.py
                    bat "phpunit headerTest.php > temp.txt"
                    bat "python tester.py"
                    // userGetFullNameTest and get result of tester.py
                    bat "phpunit userGetFullNameTest.php > temp.txt"
                    bat "python tester.py"
                    //read file results.txt
                    bat "type results.txt"
                    // delete file temp.txt
                    bat "del temp.txt"
                }
            }
        }


        stage('performance test') {
            steps{
                dir('C:/apache-jmeter-5.4.1/bin') {
                    bat 'jmeter -n -t C:/xampp/htdocs/Tatleon/tests/tatleon.jmx -l C:/xampp/htdocs/Tatleon/tests/tatleon.jtl'
                    bat 'more "C:/xampp/htdocs/Tatleon/tests/tatleon.jtl"'
                }
            }
        }


        stage('deployment') {
            steps {
                echo "Running ${env.BUILD_ID} ${env.BUILD_DISPLAY_NAME} on ${env.NODE_NAME} and JOB ${env.JOB_NAME}"
                echo pwd()
                dir('C:/xampp/htdocs/Tatleon') { 
                    bat "git_manager.bat"
                    // bat "for /D %s in (.\*) do @ ncftpput -R -v -u \"epiz_29440885\" -p \"YD0FdeMPKhs\" ftpupload.net /htdocs %s"
                    bat "for /D %%s in (.\\*) do @if not \"%%s\" == \".\\packages\" @ ncftpput -R -v -u \"epiz_29440885\" -p \"YD0FdeMPKhs\" ftpupload.net /htdocs %%s"
                    bat "for %%f in (.\\*) do @ncftpput -R -v -u \"epiz_29440885\" -p \"YD0FdeMPKhs\" ftpupload.net /htdocs %%f"
                }
            }
        }
    }
}