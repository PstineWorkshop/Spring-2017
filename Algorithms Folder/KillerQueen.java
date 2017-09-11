public class KillerQueen{

	public static void main(String [] args){
			int n = 4;
		String s= "124";
      String [] sd = s.split("");
                          //1   2   3  4   5
      char [][]B = {{'Q', ' ', ' ', ' ',' '},//1
			                  {' ', ' ', ' ', ' ','Q'}, //2
			                  {' ', ' ', 'Q', ' ',' '}, //3
			                  {' ', ' ', ' ', ' ', ' '},//4
                           {' ', 'Q', ' ', ' ',' '}//5
                           
                           };
                     
                           
                         System.out.println(  validNQueens(n,B));
                           
	}
	public static boolean validNQueens(int n, char[][] B){
		boolean valid=false;
         
         int [] eachRow = new int [B.length];//this finds the Q and marks it in the array
         
         int row;
         int col;
         int qCount=0;
		 int vQCount=0;
		 int colPointer=0;
         for(row=0;row<B.length;row++){
			 for(col=0;col<B[row].length;col++){
				 if(B[row][col]=='Q'){//checks the amount of queens that are in the array
                  qCount++;
				}
			}
		 }
        
        //if(qCount!=n) this checks both cases in one line
			if(qCount<n){//if this is true then you have less the one queen in each row
			   System.out.println("you do not have a queen in each row");
				return valid;
		    }else if(qCount>n){//you have at least more than one queen in a row
             System.out.println("you have at least one row with an extra queen");
             return valid;
       
			}else{
			 while(colPointer<n){
				 for(row=0;row<B.length;row++){
					 if(B[row][colPointer]=='Q'){
						 vQCount++;
					 }
				 }
				 if(vQCount>1){
					System.out.println("you have at least one extra Queen in a col");
                return valid;
				 }
				 colPointer++;
             vQCount=0;
			 }
		 }
		 valid = true;
         return valid;
	
	
	}



}