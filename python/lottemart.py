#-*- coding: utf-8 -*-

import sys
import urllib2
from bs4 import BeautifulSoup
import operator


def crawling_lottemart_main(keyword):
    item_list = []
    site_url = "http://www.lottemart.com/search/search.do?searchField=&searchTerm=" + keyword

    req = urllib2.Request(site_url)
    res = urllib2.urlopen(req)
    soup = BeautifulSoup(res, "lxml")
    table = soup.find("div", {"class": "prod-list clear-after"})
    soup_list = table.find_all("article")

    for list in soup_list:
        try:
            img_url = list.img["src"]
            id = list.a["onclick"]
            id = id.split(",")
            id = id[1].replace(" ", "")
            id = id.replace("'", "")
            site_url = "http://www.lottemart.com/product/ProductDetail.do?ProductCD=" + id
            title = list.find("p", {"class": "prod-name"}).text
            price = list.find("p", {"class": "price-max"})
            price = price.find("em").text.replace(",", "")
            price = int(price)
            item_list.append((id, img_url, site_url, title, price))
        except:
            print "error"

    return item_list

def main(argv):
    #print u"메인 함수"

    if len(argv)!=2:
        print u"잘못된 입력값"
        print argv
        return -1
    else:
        keyword = argv[1]
        #print u"입력받은 키워드 "
        #print keyword
    filename1 = "lottemart_인기_" + keyword + ".txt"
    filename2 = "lottemart_가격_" + keyword + ".txt"

    item_list = crawling_lottemart_main(keyword)

    item_list = item_list[:15]
    new_list = sorted(item_list, key=operator.itemgetter(4))
    count = len(item_list)
    f = open(filename1, 'w')
    f.write(str(count))
    f.write("\n")
    for item in item_list:
        data = ""
        for ob in item:
            data += str(unicode(ob).encode("utf-8")) + ","
        data = data[:-1]
        f.write(data)
        f.write("\n")
    f.close()

    f = open(filename2, 'w')
    f.write(str(count))
    f.write("\n")
    for item in new_list:
        data = ""
        for ob in item:
            data += str(unicode(ob).encode("utf-8")) + ","
        data = data[:-1]
        f.write(data)
        f.write("\n")
    f.close()

    return 0

if __name__ == '__main__':
    sys.exit(main(sys.argv))