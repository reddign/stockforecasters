import yfinance as yf

msft = yf.Ticker("MSFT")
print(msft.news)


#documentation --> https://pypi.org/project/yfinance/