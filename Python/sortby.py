def sortby():
	a = input("vvedite cifrovuu stroku ")
	#a = "2436873129871085711972919912873981719111"
	sortin = sorted(a)
	strok = ""
	for char in sortin:
		strok = strok + str(char)
	print (strok)
sortby()