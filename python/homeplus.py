#-*- coding: utf-8 -*-

import sys
from urllib import quote
import urllib2
from bs4 import BeautifulSoup
import operator


def crawling_homeplus_main(keyword):
    item_list = []
    keyword = quote(quote(keyword))
    site_url = "http://www.homeplus.co.kr/app.search.Search.ghs?comm=usr.search.basic4&search_query=" + keyword

    req = urllib2.Request(site_url)
    res = urllib2.urlopen(req)
    soup = BeautifulSoup(res, "lxml")
    table = soup.find("div", {"id": "ui-thumb-mart-1"})
    soup_list = table.find_all("li")
    count = 0

    for list in soup_list:
        try:
            img_url = list.img["src"]
            img_url = img_url[2:]
            id = list.img["onclick"]
            id = id[14:23]
            site_url = "http://www.homeplus.co.kr/app.product.GoodDetail.ghs?comm=usr.detail&good_id=" + id
            title = list.img["alt"]
            price = list.find("strong").text.replace(",", "")
            price = int(price)
            item_list.append((id, img_url, site_url, title, price))
            count += 1
        except:
            count += 1
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
    filename1 = "homeplus_인기_" + keyword + ".txt"
    filename2 = "homeplus_가격_" + keyword + ".txt"

    item_list = crawling_homeplus_main(keyword)

    item_list = item_list[:15]
    new_list = sorted(item_list, key=operator.itemgetter(4))
    f = open(filename1, 'w')
    count = len(item_list)
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