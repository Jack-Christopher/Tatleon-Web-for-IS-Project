# read result.txt find if tests are passed
# if not print failed tests

import re
# open file temp.txt
temp_file = open("temp.txt", "r")
# write result to results.txt
result_file = open("results.txt", "a")

text = "FAILURES!"

# all the text after a seire of dots

pattern = '\.\.+.+$'
results = temp_file.read()

results = re.findall(pattern, results, flags = re.DOTALL)
results =("".join(results[0].replace('\n', '\n')))

if text not in results:
    result_file.write("All tests passed!\n")
    result_file.write(results)
else:
    result_file.write("Some tests failed!\n")
    result_file.write(results)

result_file.write("\n\n")

result_file.close()
temp_file.close()