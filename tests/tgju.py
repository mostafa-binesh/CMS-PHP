import requests
from bs4 import BeautifulSoup   

def tgju_strTofloat(price):
    return float(price.replace(',',''))

r = requests.get('https://www.tgju.org/')
html = r.text.encode("utf-8")
soup = BeautifulSoup(html,'html.parser')
prices = {}
for link in soup.find_all('tr'):
    if(type(link.get('data-price'))==str): # prevent printing the Nones
        prices[link.get('data-market-row')] = tgju_strTofloat(link.get('data-price'))
def getValue(name):
    return prices[name]
print(prices) # print all received prices
print("BTC/USD: {} | USD/IRR: {}".format(prices['crypto-bitcoin'],prices['price_dollar_rl'])) # print two nerkhs
print(len(prices)) # len of prices

print(getValue('crypto-bitcoin'))