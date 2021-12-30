import time
import unittest
from random import randint
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.edge.service import Service
from webdriver_manager.microsoft import EdgeChromiumDriverManager
import re

regex = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]+\.[A-Z|a-z]{2,}\b'

s = Service(EdgeChromiumDriverManager("latest", cache_valid_range=1, log_level=0).install())
driver = webdriver.Edge(service=s)


def check(email):
    if(re.fullmatch(regex, email)):
        print("Valid Email")
 
    else:
        print("Invalid Email")
    return email

def WebTester(email):
    driver.find_element(by=By.XPATH, value="//*[@id='name']").send_keys("asd")
    driver.find_element(by=By.XPATH, value="//*[@id='last_name']").send_keys("asd")
    driver.find_element(by=By.XPATH, value="//*[@id='school']").send_keys("Economia")
    driver.find_element(by=By.XPATH, value="//*[@id='e_mail']").send_keys(email)

    button = driver.find_element_by_css_selector('btn btn-success')
    button.click()
    return email


class TestWeb(unittest.TestCase):
    def setUp(self) -> None:
        driver.get("http://tatleon.great-site.net/Dominio/Views/register.php")
        return super().setUp()

    def test1(self): 
        email = "rsan@unsa.edu.pe"
        esperado = check(email)
        print("TEST 1", email)
        self.assertEqual(WebTester(email), esperado)
    def test2(self): 
        email = "asd"
        esperado = check(email)
        print("TEST 2", email)
        self.assertEqual(WebTester(email), esperado)
    def test3(self): 
        email = "correo@gmail.com"
        esperado = check(email)
        print("TEST 3", email)
        self.assertEqual(WebTester(email), esperado)
    def test4(self): 
        email = "esarmiento@unsa.edu.pe"
        esperado = check(email)
        print("TEST 4: ", email)
        self.assertEqual(WebTester(email), esperado)

if __name__ == '__main__':
    unittest.main()


driver.quit() # close all tabs

