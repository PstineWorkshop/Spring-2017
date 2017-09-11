// The Homework5 class that finds out the first n-Queen solution
// Your name here
public class Homework5
{
    // instance variables
    private int n;                      // number of queens
    private int[] col;                  // the array that holds the column index of each queen
    private int numCalls;               // the counter that keeps track of how many times the queens method is called
    private boolean found;              // the flag that indicates if a solution is found
    
    // This method sets the number of queens, which is n.
    // Do not make any changes to this method!
    public void setNumQueens(int num)
    {
        n = num;
        col = new int[n + 1];
        numCalls = 0;
        found = false;
    }
    
    // This is a recursive method that takes an int parameter (the starting queen index)
    // and finds the first solution to the n-Queens problem.
    // Note that instead of using a for loop to print out the content of the col array, you
    // are required to print out the complete chessboard and call the verifySolution method
    // and pass col into it to verify if the current solution is correct.
    // Once the first solution is found, terminate the method call.
    public void queens(int i)
    {
        int j;
		
		if(found){
			return;
		}else{
			numCalls++;
		}
		
		
		
		if(promising(i)){
			
			if(i==n){
				
				for(i=1;i<=n;i++){
					
					for(j=1;j<=n;j++){
						if(col[i]==j){
							System.out.print('Q');
						}else{
							System.out.print('-');
						}
					}
					System.out.println();
				}
				
				verifySolution(col);
				found = true;
				
			}else{
				
				for(j=1;j<=n;j++){
					col[i+1]=j;
					queens(i+1);
				}
			}
			
			
		}
    }
    
    // This method takes an int parameter which is the index of a queen and checks
    // if placing it at col[i] can lead to a solution
    public boolean promising(int i)
    {       
        int j=1;
		
		boolean isthere =true;
		
		while(j<i && isthere==true){
			if(col[i]==col[j] || Math.abs(col[i] - col[j])==i-j){
				isthere =false;
				
				
			}
			j++;
		}
        
        return isthere;
    }
    
    // This method verifies your solution is valid.
    // Do not make any changes to this method!
    public void verifySolution(int[] col)
    {
        boolean correct = true;
        
        for (int i = 1; i <= n; i++)
        {            
            for (int k = 1; k < i; k++)
                // checks columns
                if (col[i - k] == col[i]
                    // check diagonal to upper left
                    || col[i - k] == col[i] - k
                    // check diagonal to upper right
                    || col[i - k] == col[i] + k)
                    // if any of these match, there is a conflict
                    correct = false;               
        }
        
        if (correct)
            System.out.println("This is a valid solution.\n");
        else
            System.out.println("This is not a valid solution.\n");
    }
    
    // Do not make any changes to this method!
    public int getCalls()
    {
        return numCalls;
    }
}
