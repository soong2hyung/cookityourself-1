#-*- coding: utf-8 -*-

import sys
import urllib2
from bs4 import BeautifulSoup
import operator

def crawling_emart_main(keyword):
    item_list = []
    site_url = "http://emart.ssg.com/search.ssg?target=all&query=" + keyword

    req = urllib2.Request(site_url)
    res = urllib2.urlopen(req)
    soup = BeautifulSoup(res, "lxml")
    table = soup.find("tbody", {"id": "itemList"})
    table_list = table.find_all("tr", {"class": "item_emall"})
    count = 0

    for list in table_list:
        try:
            img_url = list.img["src"]
            img_url = img_url[2:]
            id_ = list["id"]
            id_ = id_.replace("item_unit_", "")
            site_url = "http://emart.ssg.com/item/itemView.ssg?itemId=" + id_
            #print site_url
            title = list.img["title"]
            price = list.find("div",{"class": "price"}).text
            price = int(str(price[:-2]).replace(",", ""))
            item_list.append((id_, img_url, site_url, title, price))
            count += 1
        except:
            print str(count) + "error"
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
    filename1 = "emart_인기_" + keyword + ".txt"
    filename2 = "emart_가격_" + keyword + ".txt"

    item_list = crawling_emart_main(keyword)

    f = open(filename1, 'w')
    data = ""
    for ob in item_list[0]:
        data += str(unicode(ob).encode("utf-8")) + ","
    data = data[:-1]
    f.write(data)
    f.close()

    item_list = item_list[:15]
    new_list = sorted(item_list, key=operator.itemgetter(4))
    f = open(filename2, 'w')
    for a in range(0, 3):
        data = ""
        for ob in new_list[a]:
            data += str(unicode(ob).encode("utf-8")) + ","
        data = data[:-1]
        f.write(data)
        f.write("\n")
    f.close()

    return 0

if __name__ == '__main__':
    sys.exit(main(sys.argv))