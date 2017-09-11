// The Homework3 class that implements multiple methods
// Your name here
public class Homework3
{//start method
    // This method finds the index of the minimum element in array A between indices low and high.
     public int indexOfMin(int[] A, int low, int high)
    {//aa
       if(low==high){
            return low;
         
       }
          int mid = (low+high)/2;
         int Left = indexOfMin(A, low, mid);
         int Right = indexOfMin(A, mid+1, high);
       
        if(A[Left] >= A[Right])
            return Right;
            
         else
            return Left;
       
               
                
       
        // TODO: implement this method
		
       }
   
    
    
    // This method finds the length of the shortest path from vertec src to vertex dest.
    public int minCostRec(int src, int dest, int[][] W, int[][] P)
    {
	       int m = P[src][dest];
     
       if(m == 0)
       {
       
          return W[src][dest];
       }
           
     
     

      return minCostRec(src, m, W, P) + minCostRec(m, dest, W, P);		
	}


   
    
        
    // This method finds and returns the minimum element multiplications and build the order matrix P.
    public int minMulti(int n, int[] d, int[][] M, int[][] P)
    {
         for( int i=1; i<=n; i++ ) 
         {
            M[i][i] = 0;
         }
         for( int diag=1; diag <= n-1; diag++ ) 
         {
            for( int i=1; i<= n-diag; i++ ) 
            {
               int j=i + diag;
               int minCost = Integer.MAX_VALUE;

               for( int k=i; k<j; k++ ) 
               {
                  int cost = M[i][k] + M[k+1][j] + d[i-1] * d[k] * d[j];
                  if( cost < minCost ) 
                  {
                     minCost = cost;
                     P[i][j] = k;
                  }
               }
               M[i][j] = minCost;
            }     
         }
         return M[1][n];    
    }
    
          
    // This method takes as parameters an int array P, two ints, as well as a 
    // String and recursively updates the string so that it represents the order
    // of the optimal multiplications.
    // Do not make any changes to this method!
    public String buildOrder(int[][] P, int i, int j, String order)
    {
        if (i == j)
            return order + "A" + i;
        else
        {
            int k = P[i][j];
            String tmp = order + "(";
            tmp = buildOrder(P, i, k, tmp);
            tmp = buildOrder(P, k + 1, j, tmp);
            return tmp + ")";
        }
    }       
}

