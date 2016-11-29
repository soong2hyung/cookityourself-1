#-*- coding: utf-8 -*-
import sys
import csv
import requests
from bs4 import BeautifulSoup


def test_cite(a, b):
    prefix_url = "https://www.menupan.com/Cook/recipeview.asp?cookid="
    recipe_list = []
    for post_number in range(a, b):
        url_ = prefix_url + str(post_number)
        try:
            sorce_code = requests.get(url_)
            text_file = sorce_code.text
            soup = BeautifulSoup(text_file, "lxml")
            title = soup.find("h2").text
            recipe_list.append(post_number)
        except:
            print str(post_number) + " has no recipe!!!!"
    return recipe_list

def parse_menupan_cite(url_):
    item = []
    sorce_code = requests.get(url_)
    text_file = sorce_code.text
    soup = BeautifulSoup(text_file, "lxml")
    food_title = soup.find("h2").text
    img_url = soup.find("img", {"class": "img"})
    img_url = img_url["src"]
    img_url = "https://www.menupan.com" + img_url
    area_basic = soup.find("div", {"class": "areaBasic"})
    tag_1 = area_basic.find_next("dd", {"class": "name"}).text  #방법 분류 태그 획득
    tag_2 = area_basic.find_next("dl", {"class": "restTxt"})    #재료 분류 태그 획득
    tag_2 = tag_2.find_next("dd").text
    if tag_2=="0":
        tag_list = tag_1
    else :
        tag_list = tag_1 + "," + tag_2
    tag_list = tag_list.replace("/", ",")
    food_description = soup.find("ul", {"class": "tableLR"})
    ingredients_list = ""
    for list_ in food_description.find_all("a"):
        ingredients_list += list_.text+","
    ingredients_list = ingredients_list[:-1]
    #print url_+" : "+food_title+" : "+img_url
    #print tag_1 + " : " + tag_2
    item.append(food_title)
    item.append(url_)
    item.append(img_url)
    item.append(ingredients_list)
    item.append(tag_list)

    return item

def parse_menupan_main():
    items = []
    available_recipe_list_number = test_cite(1, 300)
    for i in available_recipe_list_number:
        url_ = "https://www.menupan.com/Cook/recipeview.asp?cookid=" + str(i)
        items.append(parse_menupan_cite(url_))
    return items

def main(argv):
    # print u"메인 함수"
    file_name = "menupan" + u".csv"
    items = parse_menupan_main()

    # print items
    with open(file_name, 'wb') as f:
        writer = csv.writer(f, csv.excel)
        for b in items:
            utf_8_item = []
            for x in range(0, 5):
                utf_8_item.append(unicode(b[x]).encode('utf-8'))
            writer.writerow(utf_8_item)

    print "finish"

    return 0


if __name__ == '__main__':
    sys.exit(main(sys.argv))
